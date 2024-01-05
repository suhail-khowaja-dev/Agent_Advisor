<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNoteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\LogoManagerController;
use App\Http\Controllers\PackageManagementController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubcriptionController;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\AdvisorManagementController;
use App\Http\Controllers\AgentInquiryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ClientManagementController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
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

// Route::get('/', function () {
//     return redirect()->route('index');
// })->name('/');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';


// Route::view('login', 'auth.login')->name('login');

// Route::prefix('dashboard')->group(function () {

//     Route::view('index', 'dashboard.index')->name('index');

// });
// Route::view('admin', 'auth.login')->name('admin');
Route::get('/admin', function () {
    // dd('admin');
    return view('auth.login');
})->name('/');
Route::post('/login',[FrontendController::class,'login'])->name('login');


Route::middleware(['preventBackHistory','IsAdmin'])->group(function () {

Route::prefix('dashboard')->group(function () {

    Route::view('index', 'dashboard.index')->name('index');

});

Route::prefix('admin')->group(function () {

    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin_create', [AdminController::class, 'create'])->name('admin_create');
    Route::post('admin_store', [AdminController::class, 'store'])->name('admin_store');
    Route::get('admin_edit/{id}', [AdminController::class, 'edit'])->name('admin_edit');
    Route::post('admin_update/{id}', [AdminController::class, 'update'])->name('admin_update');
    Route::get('admin_destroy/{id}', [AdminController::class, 'destroy'])->name('admin_destroy');

});

Route::prefix('user')->group(function () {

    Route::get('user', [UserManagement::class, 'index'])->name('user');
    Route::get('user-create', [UserManagement::class, 'create'])->name('user-create');
    Route::post('user-store', [UserManagement::class, 'store'])->name('user-store');
    Route::get('user-edit/{slug}', [UserManagement::class, 'edit'])->name('user-edit');
    Route::post('user_update/{id}', [UserManagement::class, 'update'])->name('user_update');
    Route::get('user-destroy/{slug}', [UserManagement::class, 'destroy'])->name('user-destroy');

});

Route::prefix('advisor-management')->group(function () {

    Route::get('advisor-management', [AdvisorManagementController::class, 'index'])->name('advisor-management');
    Route::get('advisor-create', [AdvisorManagementController::class, 'create'])->name('advisor-create');
    Route::post('advisor-store', [AdvisorManagementController::class, 'store'])->name('advisor-store');
    Route::get('advisor-management-edit/{slug}', [AdvisorManagementController::class, 'edit'])->name('advisor-management-edit');
    Route::post('advisor_update/{id}', [AdvisorManagementController::class, 'update'])->name('advisor_update');
    Route::get('advisor-destroy/{slug}', [AdvisorManagementController::class, 'destroy'])->name('advisor-destroy');

});

Route::prefix('client_management')->group(function () {

    Route::get('client_management', [ClientManagementController::class, 'index'])->name('client_management');
    Route::get('client_create', [ClientManagementController::class, 'create'])->name('client_create');
    Route::post('client_store', [ClientManagementController::class, 'store'])->name('client_store');
    Route::get('client_edit/{id?}', [ClientManagementController::class, 'edit'])->name('client_edit');
    Route::post('client_update/{id?}', [ClientManagementController::class, 'update'])->name('client_update');
    Route::get('client_show/{id}', [ClientManagementController::class, 'show'])->name('client_show');

});

Route::prefix('category-management')->group(function () {

    Route::get('category-management', [CategoryController::class, 'index'])->name('category-management');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('category_store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::post('category_update/{id}', [CategoryController::class, 'update'])->name('category_update');
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy'])->name('category-destroy');

});

Route::prefix('Configuration')->group(function () {

    Route::get('Configuration', [SubcriptionController::class, 'index'])->name('Configuration');
    Route::get('Configuration_create', [SubcriptionController::class, 'create'])->name('Configuration_create');
    Route::post('Configuration_store', [SubcriptionController::class, 'store'])->name('Configuration_store');
    Route::get('Configuration_edit/{slug}', [SubcriptionController::class, 'edit'])->name('Configuration_edit');
    Route::post('Configuration_update/{id}', [SubcriptionController::class, 'update'])->name('Configuration_update');
    Route::get('Configuration_destroy/{id}', [SubcriptionController::class, 'destroy'])->name('Configuration_destroy');

});


Route::prefix('Package')->group(function () {

    Route::get('Package', [PackageManagementController::class, 'index'])->name('Package');
    Route::get('Package_create', [PackageManagementController::class, 'create'])->name('Package_create');
    Route::post('Package_store', [PackageManagementController::class, 'store'])->name('Package_store');
    Route::get('Package_edit/{id}', [PackageManagementController::class, 'edit'])->name('Package_edit');
    Route::post('Package_update/{id}', [PackageManagementController::class, 'update'])->name('Package_update');
    Route::get('Package_destroy/{id}', [PackageManagementController::class, 'destroy'])->name('Package_destroy');

});

Route::prefix('FAQ')->group(function () {

    Route::get('FAQ', [FAQController::class, 'index'])->name('FAQ');
    Route::get('FAQ_create', [FAQController::class, 'create'])->name('FAQ_create');
    Route::post('FAQ_store', [FAQController::class, 'store'])->name('FAQ_store');
    Route::get('FAQ_edit/{id}', [FAQController::class, 'edit'])->name('FAQ_edit');
    Route::post('FAQ_update/{id}', [FAQController::class, 'update'])->name('FAQ_update');
    Route::get('FAQ_destroy/{id}', [FAQController::class, 'destroy'])->name('FAQ_destroy');

});




Route::prefix('project')->group(function () {
    // Route::view('projects', 'project.projects')->name('projects');
    Route::get('projects', [CmsController::class, 'projects_Index'])->name('projects');
    Route::get('projectcreate', [CmsController::class, 'project_create'])->name('projectcreate');
    Route::post('projectadd', [CmsController::class, 'project_add'])->name('projectadd');
    Route::get('project-edit/{id}', [CmsController::class, 'project_edit'])->name('project_edit');
    Route::post('project-update/{id}', [CmsController::class, 'project_update'])->name('project_update');
    Route::get('projectdestroy/{id}', [CmsController::class, 'project_destroy'])->name('project_destroy');

    Route::get('content', [PageContentController::class, 'content_Index'])->name('content');
    Route::get('conetntCreate', [PageContentController::class, 'content_create'])->name('contentCreate');
    Route::post('contentAdd', [PageContentController::class, 'content_add'])->name('contentAdd');
    Route::get('contentEdit/{slug}', [PageContentController::class, 'content_edit'])->name('contentEdit');
    Route::post('contentUpdate/{id}', [PageContentController::class, 'content_update'])->name('contentUpdate');
    Route::get('contentdestroy/{id}', [PageContentController::class, 'content_destroy'])->name('contentdestroy');

    Route::get('privacy', [PrivacyPolicyController::class, 'index'])->name('privacy');
    Route::get('privacyCreate', [PrivacyPolicyController::class, 'create'])->name('privacyCreate');
    Route::post('privacyAdd', [PrivacyPolicyController::class, 'store'])->name('privacyAdd');
    Route::get('privacyEdit/{slug}', [PrivacyPolicyController::class, 'edit'])->name('privacyEdit');
    Route::post('privacyUpdate/{id}', [PrivacyPolicyController::class, 'update'])->name('privacyUpdate');
    Route::get('privacydestroy/{id}', [PrivacyPolicyController::class, 'destroy'])->name('privacydestroy');

    Route::get('note', [AdminNoteController::class, 'note_Index'])->name('note');
    Route::get('noteCreate', [AdminNoteController::class, 'note_create'])->name('noteCreate');
    Route::post('noteAdd', [AdminNoteController::class, 'note_add'])->name('noteAdd');
    Route::get('noteEdit/{slug}', [AdminNoteController::class, 'note_edit'])->name('noteEdit');
    Route::post('noteUpdate/{id}', [AdminNoteController::class, 'note_update'])->name('noteUpdate');
    Route::get('notedestroy/{id}', [AdminNoteController::class, 'note_destroy'])->name('notedestroy');

    // Route::view('projectcreate', 'project.projectcreate')->name('projectcreate');
});

Route::prefix('logo')->group(function () {
    // Route::view('projects', 'project.projects')->name('projects');
    Route::get('logo', [LogoManagerController::class, 'logo_Index'])->name('logo');
    Route::get('logoCreate', [LogoManagerController::class, 'logo_create'])->name('logoCreate');
    Route::post('logoAdd', [LogoManagerController::class, 'logo_add'])->name('logoAdd');
    Route::get('logoEdit/{id}', [LogoManagerController::class, 'logo_edit'])->name('logoEdit');
    Route::post('logoUpdate/{id}', [LogoManagerController::class, 'logo_update'])->name('logoUpdate');
    Route::get('logodestroy/{id}', [LogoManagerController::class, 'logo_destroy'])->name('logodestroy');


});

Route::prefix('page')->group(function () {
    // Route::view('projects', 'project.projects')->name('projects');
    Route::get('page', [PageController::class, 'page_Index'])->name('page');
    Route::get('pageCreate', [PageController::class, 'page_create'])->name('pageCreate');
    Route::post('pageAdd', [PageController::class, 'page_add'])->name('pageAdd');
    Route::get('pageEdit/{id}', [PageController::class, 'page_edit'])->name('pageEdit');
    Route::post('pageUpdate/{id}', [PageController::class, 'page_update'])->name('pageUpdate');
    Route::get('pagedestroy/{id}', [PageController::class, 'page_destroy'])->name('pagedestroy');


});

// Route::prefix('privacy')->group(function () {
//     Route::get('privacy', [PrivacyPolicyController::class, 'index'])->name('privacy');
//     Route::get('privacyCreate', [PrivacyPolicyController::class, 'create'])->name('privacyCreate');
//     Route::post('privacyAdd', [PrivacyPolicyController::class, 'store'])->name('privacyAdd');
//     Route::get('privacyEdit/{id}', [PrivacyPolicyController::class, 'edit'])->name('privacyEdit');
//     Route::post('privacyUpdate/{id}', [PrivacyPolicyController::class, 'update'])->name('privacyUpdate');
//     Route::get('privacydestroy/{id}', [PrivacyPolicyController::class, 'destroy'])->name('privacydestroy');
// });

// Route::prefix('content')->group(function () {
//     Route::get('content', [PageContentController::class, 'content_Index'])->name('content');
//     Route::get('conetntCreate', [PageContentController::class, 'content_create'])->name('contentCreate');
//     Route::post('contentAdd', [PageContentController::class, 'content_add'])->name('contentAdd');
//     Route::get('contentEdit/{id}', [PageContentController::class, 'content_edit'])->name('contentEdit');
//     Route::post('contentUpdate/{id}', [PageContentController::class, 'content_update'])->name('contentUpdate');
//     Route::get('contentdestroy/{id}', [PageContentController::class, 'content_destroy'])->name('contentdestroy');


// });

// Route::prefix('note')->group(function () {
//     // Route::view('projects', 'project.projects')->name('projects');
//     Route::get('note', [AdminNoteController::class, 'note_Index'])->name('note');
//     Route::get('noteCreate', [AdminNoteController::class, 'note_create'])->name('noteCreate');
//     Route::post('noteAdd', [AdminNoteController::class, 'note_add'])->name('noteAdd');
//     Route::get('noteEdit/{id}', [AdminNoteController::class, 'note_edit'])->name('noteEdit');
//     Route::post('noteUpdate/{id}', [AdminNoteController::class, 'note_update'])->name('noteUpdate');
//     Route::get('notedestroy/{id}', [AdminNoteController::class, 'note_destroy'])->name('notedestroy');


// });

Route::prefix('general')->group(function () {
    // Route::view('projects', 'project.projects')->name('projects');
    // Route::resource('social',SocialController::class);
    Route::get('social', [SocialController::class, 'index'])->name('social');
    Route::get('socialCreate', [SocialController::class, 'create'])->name('socialCreate');
    Route::post('socialAdd', [SocialController::class, 'store'])->name('socialAdd');
    Route::get('socialEdit/{id}', [SocialController::class, 'edit'])->name('socialEdit');
    Route::post('socialUpdate/{id}', [SocialController::class, 'update'])->name('socialUpdate');
    Route::get('socialdestroy/{id}', [SocialController::class, 'destroy'])->name('socialdestroy');


});
Route::prefix('congfigration')->group(function () {

    Route::get('congfigration', [ConfigurationController::class, 'index'])->name('congfigration');
    Route::get('congfigrationCreate', [ConfigurationController::class, 'create'])->name('congfigrationCreate');
    Route::post('congfigrationAdd', [ConfigurationController::class, 'store'])->name('congfigrationAdd');
    Route::get('congfigrationEdit/{id}', [ConfigurationController::class, 'edit'])->name('congfigrationEdit');
    Route::post('congfigrationUpdate/{id}', [ConfigurationController::class, 'update'])->name('congfigrationUpdate');
    Route::get('congfigrationdestroy/{id}', [ConfigurationController::class, 'destroy'])->name('congfigrationdestroy');


});
Route::prefix('blog')->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::get('blogCreate', [BlogController::class, 'create'])->name('blogCreate');
    Route::post('blogAdd', [BlogController::class, 'store'])->name('blogAdd');
    Route::get('blogEdit/{id}', [BlogController::class, 'edit'])->name('blogEdit');
    Route::post('blogUpdate/{id}', [BlogController::class, 'update'])->name('blogUpdate');
    Route::get('blogdestroy/{id}', [BlogController::class, 'destroy'])->name('blogdestroy');
});

Route::prefix('Inquiry')->group(function () {

    Route::get('Inquiry', [InquiryController::class, 'index'])->name('Inquiry');
    Route::get('InquiryCreate', [InquiryController::class, 'create'])->name('InquiryCreate');
    Route::post('InquiryAdd', [InquiryController::class, 'store'])->name('InquiryAdd');
    Route::get('InquiryEdit/{id}', [InquiryController::class, 'edit'])->name('InquiryEdit');
    Route::post('InquiryUpdate/{id}', [InquiryController::class, 'update'])->name('InquiryUpdate');
    Route::get('Inquirydestroy/{slug}', [InquiryController::class, 'destroy'])->name('Inquirydestroy');
    Route::get('Inquirydetail/{slug}', [InquiryController::class, 'show'])->name('Inquirydetail');


});


Route::prefix('agent-inquiry')->group(function () {

    Route::get('agent-inquiry', [AgentInquiryController::class, 'index'])->name('agent-inquiry');
    Route::get('agent_inquiryCreate', [AgentInquiryController::class, 'create'])->name('agent_inquiryCreate');
    // Route::post('agent_inquiryAdd', [AgentInquiryController::class, 'store'])->name('agent_inquiryEdit');
    Route::get('agent_inquiryEdit/{id}', [AgentInquiryController::class, 'edit'])->name('agent_inquiryEdit');
    Route::post('agent_inquiryUpdate/{id}', [AgentInquiryController::class, 'update'])->name('agent_inquiryUpdate');
    Route::get('agent-inquiryldestroy/{slug}', [AgentInquiryController::class, 'destroy'])->name('agent-inquiryldestroy');
    Route::get('Agentldetail/{slug}', [AgentInquiryController::class, 'show'])->name('Agentldetail');


});

Route::get('/agent_status/{id?}',[UserManagement::class,'agent_status'])->name('agent_status');
Route::get('/advisor_status/{id?}',[AdvisorManagementController::class,'advisor_status'])->name('advisor_status');
});

/*
|--------------------------------------------------------------------------
| Theme Made Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::prefix('blog')->group(function () {
//     Route::view('/', 'apps.blog')->name('blog');
//     Route::view('blog-single', 'apps.blog-single')->name('blog-single');
//     Route::view('add-post', 'apps.add-post')->name('add-post');
// });





//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'de', 'es','fr','pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');






Route::prefix('authentication')->group(function () {
    // Route::view('login', 'authentication.login')->name('login');
    Route::view('login-one', 'authentication.login-one')->name('login-one');
    Route::view('login-two', 'authentication.login-two')->name('login-two');
    Route::view('login-bs-validation', 'authentication.login-bs-validation')->name('login-bs-validation');
    Route::view('login-bs-tt-validation', 'authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
    Route::view('login-sa-validation', 'authentication.login-sa-validation')->name('login-sa-validation');
    Route::view('sign-up', 'authentication.sign-up')->name('sign-up');
    Route::view('sign-up-one', 'authentication.sign-up-one')->name('sign-up-one');
    Route::view('sign-up-two', 'authentication.sign-up-two')->name('sign-up-two');
    Route::view('sign-up-wizard', 'authentication.sign-up-wizard')->name('sign-up-wizard');
    Route::view('unlock', 'authentication.unlock')->name('unlock');
    Route::view('forget-password', 'authentication.forget-password')->name('forget-password');
    // Route::view('reset-password', 'authentication.reset-password')->name('reset-password');
    Route::view('maintenance', 'authentication.maintenance')->name('maintenance');
});


Route::prefix('widgets')->group(function () {
    Route::view('general-widget', 'widgets.general-widget')->name('general-widget');
    Route::view('chart-widget', 'widgets.chart-widget')->name('chart-widget');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');
});



Route::view('file-manager', 'file-manager')->name('file-manager');
Route::view('kanban', 'kanban')->name('kanban');

Route::prefix('ecommerce')->group(function () {
    Route::view('product', 'apps.product')->name('product');
    Route::view('product-page', 'apps.product-page')->name('product-page');
    Route::view('list-products', 'apps.list-products')->name('list-products');
    Route::view('payment-details', 'apps.payment-details')->name('payment-details');
    Route::view('order-history', 'apps.order-history')->name('order-history');
    Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template');
    Route::view('cart', 'apps.cart')->name('cart');
    Route::view('list-wish', 'apps.list-wish')->name('list-wish');
    Route::view('checkout', 'apps.checkout')->name('checkout');
    Route::view('pricing', 'apps.pricing')->name('pricing');
});

Route::prefix('email')->group(function () {
    Route::view('email-application', 'apps.email-application')->name('email-application');
    Route::view('email-compose', 'apps.email-compose')->name('email-compose');
});

Route::prefix('chat')->group(function () {
    Route::view('chat', 'apps.chat')->name('chat');
    Route::view('chat-video', 'apps.chat-video')->name('chat-video');
});

Route::prefix('users')->group(function () {
    Route::view('user-profile', 'apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'apps.user-cards')->name('user-cards');
});


Route::view('bookmark', 'apps.bookmark')->name('bookmark');
Route::view('contacts', 'apps.contacts')->name('contacts');
Route::view('task', 'apps.task')->name('task');
Route::view('calendar-basic', 'apps.calendar-basic')->name('calendar-basic');
Route::view('social-app', 'apps.social-app')->name('social-app');
Route::view('to-do', 'apps.to-do')->name('to-do');
Route::view('search', 'apps.search')->name('search');

Route::prefix('ui-kits')->group(function () {
    Route::view('state-color', 'ui-kits.state-color')->name('state-color');
    Route::view('typography', 'ui-kits.typography')->name('typography');
    Route::view('avatars', 'ui-kits.avatars')->name('avatars');
    Route::view('helper-classes', 'ui-kits.helper-classes')->name('helper-classes');
    Route::view('grid', 'ui-kits.grid')->name('grid');
    Route::view('tag-pills', 'ui-kits.tag-pills')->name('tag-pills');
    Route::view('progress-bar', 'ui-kits.progress-bar')->name('progress-bar');
    Route::view('modal', 'ui-kits.modal')->name('modal');
    Route::view('alert', 'ui-kits.alert')->name('alert');
    Route::view('popover', 'ui-kits.popover')->name('popover');
    Route::view('tooltip', 'ui-kits.tooltip')->name('tooltip');
    Route::view('loader', 'ui-kits.loader')->name('loader');
    Route::view('dropdown', 'ui-kits.dropdown')->name('dropdown');
    Route::view('accordion', 'ui-kits.accordion')->name('accordion');
    Route::view('tab-bootstrap', 'ui-kits.tab-bootstrap')->name('tab-bootstrap');
    Route::view('tab-material', 'ui-kits.tab-material')->name('tab-material');
    Route::view('box-shadow', 'ui-kits.box-shadow')->name('box-shadow');
    Route::view('list', 'ui-kits.list')->name('list');
});

Route::prefix('bonus-ui')->group(function () {
    Route::view('scrollable', 'bonus-ui.scrollable')->name('scrollable');
    Route::view('tree', 'bonus-ui.tree')->name('tree');
    Route::view('bootstrap-notify', 'bonus-ui.bootstrap-notify')->name('bootstrap-notify');
    Route::view('rating', 'bonus-ui.rating')->name('rating');
    Route::view('dropzone', 'bonus-ui.dropzone')->name('dropzone');
    Route::view('tour', 'bonus-ui.tour')->name('tour');
    Route::view('sweet-alert2', 'bonus-ui.sweet-alert2')->name('sweet-alert2');
    Route::view('modal-animated', 'bonus-ui.modal-animated')->name('modal-animated');
    Route::view('owl-carousel', 'bonus-ui.owl-carousel')->name('owl-carousel');
    Route::view('ribbons', 'bonus-ui.ribbons')->name('ribbons');
    Route::view('pagination', 'bonus-ui.pagination')->name('pagination');
    Route::view('breadcrumb', 'bonus-ui.breadcrumb')->name('breadcrumb');
    Route::view('range-slider', 'bonus-ui.range-slider')->name('range-slider');
    Route::view('image-cropper', 'bonus-ui.image-cropper')->name('image-cropper');
    Route::view('sticky', 'bonus-ui.sticky')->name('sticky');
    Route::view('basic-card', 'bonus-ui.basic-card')->name('basic-card');
    Route::view('creative-card', 'bonus-ui.creative-card')->name('creative-card');
    Route::view('tabbed-card', 'bonus-ui.tabbed-card')->name('tabbed-card');
    Route::view('dragable-card', 'bonus-ui.dragable-card')->name('dragable-card');
    Route::view('timeline-v-1', 'bonus-ui.timeline-v-1')->name('timeline-v-1');
    Route::view('timeline-v-2', 'bonus-ui.timeline-v-2')->name('timeline-v-2');
    Route::view('timeline-small', 'bonus-ui.timeline-small')->name('timeline-small');
});

Route::prefix('builders')->group(function () {
    Route::view('form-builder-1', 'builders.form-builder-1')->name('form-builder-1');
    Route::view('form-builder-2', 'builders.form-builder-2')->name('form-builder-2');
    Route::view('pagebuild', 'builders.pagebuild')->name('pagebuild');
    Route::view('button-builder', 'builders.button-builder')->name('button-builder');
});

Route::prefix('animation')->group(function () {
    Route::view('animate', 'animation.animate')->name('animate');
    Route::view('scroll-reval', 'animation.scroll-reval')->name('scroll-reval');
    Route::view('aos', 'animation.aos')->name('aos');
    Route::view('tilt', 'animation.tilt')->name('tilt');
    Route::view('wow', 'animation.wow')->name('wow');
});


Route::prefix('icons')->group(function () {
    Route::view('flag-icon', 'icons.flag-icon')->name('flag-icon');
    Route::view('font-awesome', 'icons.font-awesome')->name('font-awesome');
    Route::view('ico-icon', 'icons.ico-icon')->name('ico-icon');
    Route::view('themify-icon', 'icons.themify-icon')->name('themify-icon');
    Route::view('feather-icon', 'icons.feather-icon')->name('feather-icon');
    Route::view('whether-icon', 'icons.whether-icon')->name('whether-icon');
    Route::view('simple-line-icon', 'icons.simple-line-icon')->name('simple-line-icon');
    Route::view('material-design-icon', 'icons.material-design-icon')->name('material-design-icon');
    Route::view('pe7-icon', 'icons.pe7-icon')->name('pe7-icon');
    Route::view('typicons-icon', 'icons.typicons-icon')->name('typicons-icon');
    Route::view('ionic-icon', 'icons.ionic-icon')->name('ionic-icon');
});

Route::prefix('buttons')->group(function () {
    Route::view('buttons', 'buttons.buttons')->name('buttons');
    Route::view('buttons-flat', 'buttons.buttons-flat')->name('buttons-flat');
    Route::view('buttons-edge', 'buttons.buttons-edge')->name('buttons-edge');
    Route::view('raised-button', 'buttons.raised-button')->name('raised-button');
    Route::view('button-group', 'buttons.button-group')->name('button-group');
});

Route::prefix('forms')->group(function () {
    Route::view('form-validation', 'forms.form-validation')->name('form-validation');
    Route::view('base-input', 'forms.base-input')->name('base-input');
    Route::view('radio-checkbox-control', 'forms.radio-checkbox-control')->name('radio-checkbox-control');
    Route::view('input-group', 'forms.input-group')->name('input-group');
    Route::view('megaoptions', 'forms.megaoptions')->name('megaoptions');
    Route::view('datepicker', 'forms.datepicker')->name('datepicker');
    Route::view('time-picker', 'forms.time-picker')->name('time-picker');
    Route::view('datetimepicker', 'forms.datetimepicker')->name('datetimepicker');
    Route::view('daterangepicker', 'forms.daterangepicker')->name('daterangepicker');
    Route::view('touchspin', 'forms.touchspin')->name('touchspin');
    Route::view('select2', 'forms.select2')->name('select2');
    Route::view('switch', 'forms.switch')->name('switch');
    Route::view('typeahead', 'forms.typeahead')->name('typeahead');
    Route::view('clipboard', 'forms.clipboard')->name('clipboard');
    Route::view('default-form', 'forms.default-form')->name('default-form');
    Route::view('form-wizard', 'forms.form-wizard')->name('form-wizard');
    Route::view('form-wizard-two', 'forms.form-wizard-two')->name('form-wizard-two');
    Route::view('form-wizard-three', 'forms.form-wizard-three')->name('form-wizard-three');
    Route::post('form-wizard-three', function(){
        return redirect()->route('form-wizard-three');
    })->name('form-wizard-three-post');
});

Route::prefix('tables')->group(function () {
    Route::view('bootstrap-basic-table', 'tables.bootstrap-basic-table')->name('bootstrap-basic-table');
    Route::view('bootstrap-sizing-table', 'tables.bootstrap-sizing-table')->name('bootstrap-sizing-table');
    Route::view('bootstrap-border-table', 'tables.bootstrap-border-table')->name('bootstrap-border-table');
    Route::view('bootstrap-styling-table', 'tables.bootstrap-styling-table')->name('bootstrap-styling-table');
    Route::view('table-components', 'tables.table-components')->name('table-components');
    Route::view('datatable-basic-init', 'tables.datatable-basic-init')->name('datatable-basic-init');
    Route::view('datatable-advance', 'tables.datatable-advance')->name('datatable-advance');
    Route::view('datatable-styling', 'tables.datatable-styling')->name('datatable-styling');
    Route::view('datatable-ajax', 'tables.datatable-ajax')->name('datatable-ajax');
    Route::view('datatable-server-side', 'tables.datatable-server-side')->name('datatable-server-side');
    Route::view('datatable-plugin', 'tables.datatable-plugin')->name('datatable-plugin');
    Route::view('datatable-api', 'tables.datatable-api')->name('datatable-api');
    Route::view('datatable-data-source', 'tables.datatable-data-source')->name('datatable-data-source');
    Route::view('datatable-ext-autofill', 'tables.datatable-ext-autofill')->name('datatable-ext-autofill');
    Route::view('datatable-ext-basic-button', 'tables.datatable-ext-basic-button')->name('datatable-ext-basic-button');
    Route::view('datatable-ext-col-reorder', 'tables.datatable-ext-col-reorder')->name('datatable-ext-col-reorder');
    Route::view('datatable-ext-fixed-header', 'tables.datatable-ext-fixed-header')->name('datatable-ext-fixed-header');
    Route::view('datatable-ext-html-5-data-export', 'tables.datatable-ext-html-5-data-export')->name('datatable-ext-html-5-data-export');
    Route::view('datatable-ext-key-table', 'tables.datatable-ext-key-table')->name('datatable-ext-key-table');
    Route::view('datatable-ext-responsive', 'tables.datatable-ext-responsive')->name('datatable-ext-responsive');
    Route::view('datatable-ext-row-reorder', 'tables.datatable-ext-row-reorder')->name('datatable-ext-row-reorder');
    Route::view('datatable-ext-scroller', 'tables.datatable-ext-scroller')->name('datatable-ext-scroller');
    Route::view('jsgrid-table', 'tables.jsgrid-table')->name('jsgrid-table');
});

Route::prefix('charts')->group(function () {
    Route::view('echarts', 'charts.echarts')->name('echarts');
    Route::view('chart-apex', 'charts.chart-apex')->name('chart-apex');
    Route::view('chart-google', 'charts.chart-google')->name('chart-google');
    Route::view('chart-sparkline', 'charts.chart-sparkline')->name('chart-sparkline');
    Route::view('chart-flot', 'charts.chart-flot')->name('chart-flot');
    Route::view('chart-knob', 'charts.chart-knob')->name('chart-knob');
    Route::view('chart-morris', 'charts.chart-morris')->name('chart-morris');
    Route::view('chartjs', 'charts.chartjs')->name('chartjs');
    Route::view('chartist', 'charts.chartist')->name('chartist');
    Route::view('chart-peity', 'charts.chart-peity')->name('chart-peity');
});

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('internationalization', 'pages.internationalization')->name('internationalization');

Route::prefix('starter-kit')->group(function () {
});

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});



Route::view('comingsoon', 'comingsoon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'comingsoon.comingsoon-bg-video')->name('comingsoon-bg-video');
Route::view('comingsoon-bg-img', 'comingsoon.comingsoon-bg-img')->name('comingsoon-bg-img');

Route::view('basic-template', 'email-templates.basic-template')->name('basic-template');
Route::view('email-header', 'email-templates.email-header')->name('email-header');
Route::view('template-email', 'email-templates.template-email')->name('template-email');
Route::view('template-email-2', 'email-templates.template-email-2')->name('template-email-2');
Route::view('ecommerce-templates', 'email-templates.ecommerce-templates')->name('ecommerce-templates');
Route::view('email-order-success', 'email-templates.email-order-success')->name('email-order-success');


Route::prefix('gallery')->group(function () {
    Route::view('/', 'apps.gallery')->name('gallery');
    Route::view('gallery-with-description', 'apps.gallery-with-description')->name('gallery-with-description');
    Route::view('gallery-masonry', 'apps.gallery-masonry')->name('gallery-masonry');
    Route::view('masonry-gallery-with-disc', 'apps.masonry-gallery-with-disc')->name('masonry-gallery-with-disc');
    Route::view('gallery-hover', 'apps.gallery-hover')->name('gallery-hover');
});




Route::view('faq', 'apps.faq')->name('faq');

Route::prefix('job-search')->group(function () {
    Route::view('job-cards-view', 'apps.job-cards-view')->name('job-cards-view');
    Route::view('job-list-view', 'apps.job-list-view')->name('job-list-view');
    Route::view('job-details', 'apps.job-details')->name('job-details');
    Route::view('job-apply', 'apps.job-apply')->name('job-apply');
});

Route::prefix('learning')->group(function () {
    Route::view('learning-list-view', 'apps.learning-list-view')->name('learning-list-view');
    Route::view('learning-detailed', 'apps.learning-detailed')->name('learning-detailed');
});

Route::prefix('maps')->group(function () {
    Route::view('map-js', 'apps.map-js')->name('map-js');
    Route::view('vector-map', 'apps.vector-map')->name('vector-map');
});

Route::prefix('editors')->group(function () {
    Route::view('summernote', 'apps.summernote')->name('summernote');
    Route::view('ckeditor', 'apps.ckeditor')->name('ckeditor');
    Route::view('simple-mde', 'apps.simple-mde')->name('simple-mde');
    Route::view('ace-code-editor', 'apps.ace-code-editor')->name('ace-code-editor');
});

Route::view('knowledgebase', 'apps.knowledgebase')->name('knowledgebase');
Route::view('support-ticket', 'apps.support-ticket')->name('support-ticket');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::get('layout-{light}', function($light){
    session()->put('layout', $light);
    session()->get('layout');
    if($light == 'vertical-layout')
    {
        return redirect()->route('pages-vertical-layout');
    }
    return redirect()->route('index');
    return 1;
});
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');


//Frontend Routes
Route::get('/',[FrontendController::class,'index'])->name('agent_advisor');
Route::get('Frontend_agent_advisor',[FrontendController::class,'Frontendlogout'])->name('Frontend_agent_advisor');
Route::post('/agent_advisor_process',[FrontendController::class,'agentadvisorProcess'])->name('agent_advisor_process');
Route::get('/become_agent',[FrontendController::class,'becomeAgent'])->name('become_agent');
Route::post('/become_agent_process',[FrontendController::class,'becomeagentProcess'])->name('become_agent_process');
Route::get('/forget_password',[FrontendController::class,'forgetpassword'])->name('forget_password');
Route::get('/privacy-policy',[FrontendController::class,'privacypolicy'])->name('privacy-policy');

Route::middleware(['preventBackHistory','Advisor'])->group(function () {
    Route::post('/contact_process',[FrontendController::class,'contactprocess'])->name('contact_process');
    Route::post('/contact_process_advisor',[FrontendController::class,'contactprocessAdvisor'])->name('contact_process_advisor');

    Route::get('/agent-details/{slug}',[FrontendController::class,'agentdetails'])->name('agent-details');
    Route::get('/agent_clients',[FrontendController::class,'agentclients'])->name('agent_clients');
    Route::post('/logout',[FrontendController::class,'logout'])->name('logout');
    Route::get('/agent',[FrontendController::class,'agent'])->name('agent');
    Route::get('/agent-contact',[FrontendController::class,'agentcontact'])->name('agent-contact');
    // Route::get('/agent_profile',[FrontendController::class,'agentprofile'])->name('agent_profile');
    Route::get('/agent_delete/{id}',[FrontendController::class,'agentdelete'])->name('agent_delete');
    Route::get('/advisor-edit/{slug}',[FrontendController::class,'editadvisor'])->name('advisor-edit');
    Route::post('/advisorupdate/{id}',[FrontendController::class,'advisorupdate'])->name('advisorupdate');
    Route::post('/update_status',[FrontendController::class,'updatestatus'])->name('update_status');
    Route::get('/agent-profile/{slug}',[FrontendController::class,'editAgentprofile'])->name('agent-profile');
    Route::post('/profile_update/{id}',[FrontendController::class,'profileUpdate'])->name('profile_update');


    Route::post('/add_notes/{id?}',[FrontendController::class,'notes'])->name('add_notes');

    Route::get('/status/{id}',[FrontendController::class,'updateStatus'])->name('status');
    Route::get('/decline/{id}',[FrontendController::class,'declinetatus'])->name('decline');
    Route::get('/accept/{id}',[FrontendController::class,'acceptstatus'])->name('accept');


    Route::get('/advisor',[FrontendController::class,'advisor'])->name('advisor');
    Route::get('/client-details/{slug}',[FrontendController::class,'advisordetails'])->name('client-details');
    Route::get('/advisor_dashboard',[FrontendController::class,'advisordashboard'])->name('advisor_dashboard');
    Route::post('/logout',[FrontendController::class,'logout'])->name('logout');
    Route::get('/refer-clients',[FrontendController::class,'referclients'])->name('refer-clients');
    Route::get('/advisor-contact',[FrontendController::class,'advisorcontact'])->name('advisor-contact');
    Route::post('refer_client_process',[FrontendController::class,'referclientProcess'])->name('refer_client_process');
    Route::post('/agent_reasign',[FrontendController::class,'agentreasign'])->name('agent_reasign');
    Route::post('/status_update/{id}',[FrontendController::class,'statusupdate'])->name('status_update');

    Route::get('/get_client',[FrontendController::class,'get_client'])->name('get_client');
    Route::get('/get_location',[FrontendController::class,'locationclients'])->name('get_location');
    Route::get('/reassign_clients',[FrontendController::class,'reassign'])->name('reassign_clients');
    //Forget password
    Route::post('/forget_email',[FrontendController::class,'forgetpasswordProces'])->name('forget_email');
    Route::get('/reset-password/{token}',[FrontendController::class,'getPassword'])->name('reset-password');
    Route::post('/update_password',[FrontendController::class,'updatepassword'])->name('update_password');

    //state dependent drop down routes
    Route::get('/get_state_location',[FrontendController::class,'statelocation'])->name('get_state_location');

    Route::post('terms/{id}',[FrontendController::class,'termscondition'])->name('terms');
    Route::get('terms-get/{id}',[FrontendController::class,'termsconditionget'])->name('terms-get');

});
// Route::get('/states',function(){
//     $states = ['{"AK":"Alaska","AL":"Alabama","AR":"Arkansas","AZ":"Arizona","CA":"California","CO":"Colorado","CT":"Connecticut","DC":"Washington,D.C","DE":"Delaware","FL":"Florida","GA":"Georgia","HI":"Hawaii","IA":"Iowa","ID":"Idaho","IL":"Illinois","IN":"Indiana","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","MA":"Massachusetts","MD":"Maryland","ME":"Maine","MI":"Michigan","MN":"Minnesota","MO":"Missouri","MS":"Mississippi","MT":"Montana","NC":"North Carolina","ND":"North Dakota","NE":"Nebraska","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NV":"Nevada","NY":"New York","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VA":"Virginia","VT":"Vermont","WA":"Washington","WI":"Wisconsin","WV":"West Virginia","WY":"Wyoming"}';]

//         foreach(json_decode($states) as $item)
//                 {
//                     $state = new State();
//                     $state->state = $item;
//                     $state->save();
//                 }

// });

// Redirect to error page  when no any route found
Route::any('{url}', function(){
    return view('errors.404');
})->where('url', '.*');
