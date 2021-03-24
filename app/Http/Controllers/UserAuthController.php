<?PHP
namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator; //驗證器
use Hash; //雜湊
use Mail; //寄信
use Socialite;
use Session;
use App\Models\indexModel;
// use App\Shop\Entity\User; //使用者 Eloquent ORM Model

class UserAuthController extends Controller
{
    protected $DB;
    public function __construct()
    {
        $this->DB = new indexModel();
    }

    //Facebook登入
    public function facebookSignInProcess()
    {
        $redirect_url = env('FB_REDIRECT');

        return Socialite::driver('facebook')
                        // ->scopes(['user_friends'])
                        ->redirectUrl($redirect_url)
                        ->redirect();
    }

    //Google登入
    public function googleSignInProcess()
    {
        $redirect_url = env('GOOGLE_REDIRECT');

        return Socialite::driver('google')
                        // ->scopes(['user_friends'])
                        ->redirectUrl($redirect_url)
                        ->redirect();
    }

    //Facebook登入重新導向授權資料處理
    public function facebookSignInCallbackProcess()
    {
        if(request()->error=="access_denied")
        {
            throw new Exception('授權失敗，存取錯誤');
        }
        //依照網域產出重新導向連結 (來驗證是否為發出時同一callback)
        $redirect_url = env('FB_REDIRECT');
        //取得第三方使用者資料
        
        $user = Socialite::driver('facebook')->user();
        // dd($user);
        
        $FacebookUser = Socialite::driver('facebook')
            // ->fields([
            //     'id',
            //     'name',
            //     'email',
            // ])
            ->redirectUrl($redirect_url)->user();
       
        $facebook_email = $FacebookUser->email;

        if(is_null($facebook_email))
        {
            throw new Exception('未授權取得使用者 Email');
        }
        //取得 Facebook 資料
        $facebook_id = $FacebookUser->id;
        $facebook_name = $FacebookUser->name;

        Session::put('user_name', $facebook_id);
        Session::put('email', $facebook_email);
        Session::put('name', $facebook_name);

        $result = $this->DB->insert_social_user(Session::get('user_name'), Session::get('email'), Session::get('name'));

        // if(!is_null(($result))){
        //     Session::put('name', $result->name);
        // }
        
        if(Session::has('pre_page')){
            echo "<script>location.href = '".Session::get('pre_page')."'</script>";
        }else{
            echo "<script>location.href = '".url('/')."'</script>";
        }

        // dd(Session::all());
        //*/
    }

    public function googleSignInCallbackProcess()
    {
        if(request()->error=="access_denied")
        {
            throw new Exception('授權失敗，存取錯誤');
        }
        //依照網域產出重新導向連結 (來驗證是否為發出時同一callback)
        $redirect_url = env('GOOGLE_REDIRECT');
        //取得第三方使用者資料
        
        $user = Socialite::driver('google')->user();
        // dd($user);
        
        $GoogleUser = Socialite::driver('google')
            // ->fields([
            //     'id',
            //     'name',
            //     'email',
            // ])
            ->redirectUrl($redirect_url)->user();
       
        $google_email = $GoogleUser->email;

        if(is_null($google_email))
        {
            throw new Exception('未授權取得使用者 Email');
        }
        //取得 Facebook 資料
        $google_id = $GoogleUser->id;
        $google_name = $GoogleUser->name;

        Session::put('user_name', $google_id);
        Session::put('email', $google_email);
        Session::put('name', $google_name);

        $result = $this->DB->insert_social_user(Session::get('user_name'), Session::get('email'), Session::get('name'));

        // if(!is_null(($result))){
        //     // Session::put('name', $result->name);
        // }
        
        if(Session::has('pre_page')){
            echo "<script>location.href = '".Session::get('pre_page')."'</script>";
        }else{
            echo "<script>location.href = '".url('/')."'</script>";
        }

        // dd(Session::all());
        //*/
    }
}
?>