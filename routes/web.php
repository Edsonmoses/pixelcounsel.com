<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Livewire\AddVectorComponent;
use App\Http\Livewire\Admin\AdminAddAdsComponent;
use App\Http\Livewire\Admin\AdminAddAlpFilterComponent;
use App\Http\Livewire\Admin\AdminAddBlogComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddEventcategoryComponent;
use App\Http\Livewire\Admin\AdminAddEventsComponent;
use App\Http\Livewire\Admin\AdminAddEventTypeComponent;
use App\Http\Livewire\Admin\AdminAddHookupCategoryComponent;
use App\Http\Livewire\Admin\AdminAddHookupComponent;
use App\Http\Livewire\Admin\AdminAddJargonCategoryComponent;
use App\Http\Livewire\Admin\AdminAddJargonComponent;
use App\Http\Livewire\Admin\AdminAddVectorCategoryComponent;
use App\Http\Livewire\Admin\AdminAddVectorComponent;
use App\Http\Livewire\Admin\AdminAdsComponent;
use App\Http\Livewire\Admin\AdminAlpFilterComponent;
use App\Http\Livewire\Admin\AdminBlogComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditAdsComponent;
use App\Http\Livewire\Admin\AdminEditAlpFilterComponent;
use App\Http\Livewire\Admin\AdminEditBlogComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditEventCategoryComponent;
use App\Http\Livewire\Admin\AdminEditEventsComponent;
use App\Http\Livewire\Admin\AdminEditEventTypeComponent;
use App\Http\Livewire\Admin\AdminEditHookupCategoryComponent;
use App\Http\Livewire\Admin\AdminEditHookupComponent;
use App\Http\Livewire\Admin\AdminEditJargonComponent;
use App\Http\Livewire\Admin\AdminEditVectorCategoryComponent;
use App\Http\Livewire\Admin\AdminEditVectorComponent;
use App\Http\Livewire\Admin\AdminEventcategoryComponent;
use App\Http\Livewire\Admin\AdminEventsComponent;
use App\Http\Livewire\Admin\AdminEventTypeComponent;
use App\Http\Livewire\Admin\AdminHookupCategoryComponent;
use App\Http\Livewire\Admin\AdminHookupComponent;
use App\Http\Livewire\Admin\AdminJargonCategoryComponent;
use App\Http\Livewire\Admin\AdminJargonComponent;
use App\Http\Livewire\Admin\AdminVectorCategoryComponent;
use App\Http\Livewire\Admin\AdminVectorComponent;
use App\Http\Livewire\ApplyJobComponent;
use App\Http\Livewire\AtributesComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\EventAddComponent;
use App\Http\Livewire\EventDetailsComponent;
use App\Http\Livewire\EventsCategoryComponent;
use App\Http\Livewire\EventsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\HookupAddComponent;
use App\Http\Livewire\HookupApplyjobComponent;
use App\Http\Livewire\HookupCategoryComponent;
use App\Http\Livewire\HookupComponent;
use App\Http\Livewire\HookupDedailsComponent;
use App\Http\Livewire\HookupJobApplicationComponent;
use App\Http\Livewire\JargonbusterComponent;
use App\Http\Livewire\JargonCategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\TermsOfUseComponent;
use App\Http\Livewire\User\UserAddEventComponent;
use App\Http\Livewire\User\UserAddHookComponent;
use App\Http\Livewire\User\UserAddVectorsComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEditEventComponent;
use App\Http\Livewire\User\UsereditHookupComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserEditVectorComponent;
use App\Http\Livewire\User\UserEventComponent;
use App\Http\Livewire\User\UserHookupComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserSettingComponent;
use App\Http\Livewire\User\UserVectorComponent;
use App\Http\Livewire\VectorComponent;
use App\Http\Livewire\VectorlogosComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',HomeComponent::class);

Route::get('/vector', VectorComponent::class)->name('vector');
Route::get('/vectors/{slug}', VectorlogosComponent::class)->name('vector.vectors');
Route::get('/add-vectors/add', AddVectorComponent::class)->name('vector.addvectors');
Route::get('/vector/{vtag}', VectorComponent::class)->name('vector.vtag');

Route::get('/jargon', JargonbusterComponent::class);
Route::get('/jargon-category/{category_slug}', JargonCategoryComponent::class)->name('jargon.category');
Route::get('/jargons-category/{atributes_name}', AtributesComponent::class)->name('jargon.atributes');

Route::get('/hookup', HookupComponent::class);
Route::get('/hookup-category/{category_slug}', HookupCategoryComponent::class)->name('hookup.category');
Route::get('/hookup-details/{hookup_slug}', HookupDedailsComponent::class)->name('hookup.details');
Route::get('/hookup/add', HookupAddComponent::class)->name('hookup.addhookup');
Route::get('/hookup/fetch', HookupAddComponent::class)->name('hookup.fetch');
Route::get('/job-application', HookupJobApplicationComponent::class)->name('hookup.applyjob');

Route::get('/events', EventsComponent::class);
Route::get('/events-category/{category_slug}', EventsCategoryComponent::class)->name('events.category');
Route::get('/events-details/{event_slug}', EventDetailsComponent::class)->name('events.details');
Route::get('/events/add', EventAddComponent::class)->name('events.addevent');

Route::get('/blog', BlogComponent::class);

Route::get('/search', SearchComponent::class)->name('vector.search');
Route::get('/terms-of-use', TermsOfUseComponent::class);
Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});
Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
// Google Login URL
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //return view('dashboard');
//})->name('dashboard');

Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');

Route::get('newsletter',[NewsletterController::class, 'create']);
Route::post('newsletter',[NewsletterController::class,'store']);


//For Users or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit',UserEditProfileComponent::class)->name('user.edit_profile');
    Route::get('/user/setting',UserSettingComponent::class)->name('user.setting');
    Route::get('/user/2fa',UserSettingComponent::class)->name('user.2faenable');
    Route::get('/user/delete-account',UserSettingComponent::class)->name('user.daccount');

    //for vectors
    Route::get('/user/vectors', UserVectorComponent::class)->name('user.vectors');
    Route::get('/user/vector/add', UserAddVectorsComponent::class)->name('user.vecadd');
    Route::get('/user/vector/edit/{vector_slug}', UserEditVectorComponent::class)->name('user.vecedit');
    Route::get('/user/vectors/edit', UserVectorComponent::class)->name('user.vecedits');
    
    //for events
    Route::get('/user/events', UserEventComponent::class)->name('user.events');
    Route::get('/user/event/add', UserAddEventComponent::class)->name('user.evadd');
    Route::get('/user/event/edit/{event_slug}', UserEditEventComponent::class)->name('user.evedit');
    Route::get('/user/events/edit', UserEventComponent::class)->name('user.evedits');
    //for hookups
    Route::get('/user/hookups', UserHookupComponent::class)->name('user.hookups');
    Route::get('/user/hookup/add', UserAddHookComponent::class)->name('user.hookadd');
    Route::get('/user/hookup/edit/{hookup_slug}', UsereditHookupComponent::class)->name('user.hookedit');
    Route::get('/user/hookups/edit', UserHookupComponent::class)->name('user.hookedits');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

      //Blog Categories
      Route::get('admin/categories', AdminCategoryComponent::class)->name('admin.categories');
      Route::get('admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
      Route::get('admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
      //Blog Categories
      Route::get('admin/blogs',AdminBlogComponent::class)->name('admin.blog');
      Route::get('admin/blog/add',AdminAddBlogComponent::class)->name('admin.addblog');
      Route::get('admin/blog/edit/{blog_slug}',AdminEditBlogComponent::class)->name('admin.editblog');
      //Vector Categories
      Route::get('admin/vectors', AdminVectorCategoryComponent::class)->name('admin.vectors');
      Route::get('admin/vector/add', AdminAddVectorCategoryComponent::class)->name('admin.addvector');
      Route::get('admin/vector/edit/{vector_slug}',AdminEditVectorCategoryComponent::class)->name('admin.editvector');
       //Vectors
       Route::get('admin/vector/logos',AdminVectorComponent::class)->name('admin.vectorlogos');
       Route::get('admin/vector/logos/add',AdminAddVectorComponent::class)->name('admin.addvectorlogos');
       Route::get('admin/vector/logos/edit/{vector_slug}',AdminEditVectorComponent::class)->name('admin.editvectorlogos');
          //Events Categories
      Route::get('admin/events',AdminEventcategoryComponent::class)->name('admin.events');
      Route::get('admin/event/add',AdminAddEventcategoryComponent::class)->name('admin.addevent');
      Route::get('admin/event/edit/{event_slug}',AdminEditEventCategoryComponent::class)->name('admin.editevent');
      //Events Types
      Route::get('admin/etypes',AdminEventTypeComponent::class)->name('admin.etypes');
      Route::get('admin/etypes/add',AdminAddEventTypeComponent::class)->name('admin.addetypes');
      Route::get('admin/etypes/edit/{etype_slug}',AdminEditEventTypeComponent::class)->name('admin.editetypes');
       //Events
       Route::get('admin/event',AdminEventsComponent::class)->name('admin.event');
       Route::get('admin/events/add',AdminAddEventsComponent::class)->name('admin.addevents');
       Route::get('admin/events/edit/{event_slug}',AdminEditEventsComponent::class)->name('admin.editevents');
       //Hookups Categories
       Route::get('admin/hookups',AdminHookupCategoryComponent::class)->name('admin.hookups');
       Route::get('admin/hookup/add',AdminAddHookupCategoryComponent::class)->name('admin.addhookup');
       Route::get('admin/hookup/edit/{hookup_slug}',AdminEditHookupCategoryComponent::class)->name('admin.edithookup');
       //Hookups
       Route::get('admin/hookup',AdminHookupComponent::class)->name('admin.hookup');
       Route::get('admin/hookups/add',AdminAddHookupComponent::class)->name('admin.addhookups');
       Route::get('admin/hookups/edit/{hookup_slug}',AdminEditHookupComponent::class)->name('admin.edithookups');
       //Jargons categories
       Route::get('admin/jargons',AdminJargonCategoryComponent::class)->name('admin.jargons');
       Route::get('admin/jargon/add',AdminAddJargonCategoryComponent::class)->name('admin.addjargon');
       Route::get('admin/jargon/edit/{jargon_slug}',AdminEditHookupCategoryComponent::class)->name('admin.editjargon');
       //Jargons
       Route::get('admin/jargon',AdminJargonComponent::class)->name('admin.jargon');
       Route::get('admin/jargons/add',AdminAddJargonComponent::class)->name('admin.addjargons');
       Route::get('admin/jargons/edit/{jargon_slug}',AdminEditJargonComponent::class)->name('admin.editjargons');
       //Atributes
       Route::get('admin/atributes',AdminAlpFilterComponent::class)->name('admin.alpfilter');
       Route::get('admin/atributes/add',AdminAddAlpFilterComponent::class)->name('admin.addalpfilter');
       Route::get('admin/atributes/edit/{name}',AdminEditAlpFilterComponent::class)->name('admin.editalpfilter');
       //Ads
       Route::get('/admin/ads',AdminAdsComponent::class)->name('admin.ads');
       Route::get('/admin/ads/add',AdminAddAdsComponent::class)->name('admin.add_ads');
       Route::get('/admin/ads/edit/{name}',AdminEditAdsComponent::class)->name('admin.edit_ads');
});

