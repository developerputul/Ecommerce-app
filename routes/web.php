<?php

use  App\Http\Controllers\ProfileController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\Home\HomeSliderController;
use  App\Http\Controllers\Home\AboutController;
use  App\Http\Controllers\Home\PortfolioController;
use  App\Http\Controllers\Home\BlogCategoryController;
use  App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

//Route section

Route::get('/', function () {
    return view('website.index');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


#All Admin routes
Route::middleware(['auth'])->group(function () {

Route::controller(AdminController::class)->group(function(){

    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('edit/profile', 'Editprofile')->name('edit.profile');
    Route::post('store/profile', 'Storeprofile')->name('store.profile');

    Route::get('change.password', 'Changepassword')->name('change.password');
    Route::post('update/password', 'UpdatePassword')->name('update.password');

});
});

    #Home-slide all routes
    Route::controller(HomeSliderController::class)->group(function(){
    #Home
    Route::get('home/slide', 'HomeSlider')->name('home.slide');
    Route::post('update/slider', 'UpdateSlider')->name('update.slider');
});

    #About-page all routes
Route::controller(AboutController::class)->group(function(){
    #About
    Route::get('about/page', 'AboutPage')->name('about.page');
    Route::post('update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');


    #About-page all routes
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('store/multi/image', 'StoreMultiImage')->name('store.multi.image');

    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::get('delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    Route::post('update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
});


    #Portfolio-all routes
    Route::controller(PortfolioController::class)->group(function(){
        #Home
        Route::get('all/portfolio', 'AllPortfolio')->name('all.portfolio');
        Route::get('add/portfolio', 'AddPortfolio')->name('add.portfolio');
        Route::post('store/portfolio', 'StorePortfolio')->name('store.portfolio');
        Route::get('edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
        Route::post('update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
        Route::get('delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
        Route::get('portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');

        Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');
    });

    #Blog Category All routes
    Route::controller(BlogCategoryController::class)->group(function(){
         #Blog Category
        Route::get('all/blog/category','AllBlogCategory')->name('all.blog.category');
        Route::get('add/blog/category','AddBlogCategory')->name('add.blog.category');
        Route::post('store/blog/category','StoreBlogCategory')->name('store.blog.category');
        Route::get('edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
        Route::post('update/blog/category/{id}','UpdateBlogCategory')->name('update.blog.category');
        Route::get('delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');

 });

    #Blog All routes
    Route::controller(BlogController::class)->group(function(){
        #Blog category

        Route::get('all/blog', 'AllBlog')->name('all.blog');
        Route::get('add/blog', 'AddBlog')->name('add.blog');
        Route::post('store/blog', 'StoreBlog')->name('store.blog');
        Route::get('edit/blog/{id}', 'EditBlog')->name('edit.blog');
        Route::post('update/blog', 'UpdateBlog')->name('update.blog');
        Route::get('delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

        Route::get('blog/details/{id}', 'BlogDetails')->name('blog.details');
        Route::get('category/blog/{id}', 'CategoryBlog')->name('category.blog');
        
        Route::get('/blog', 'HomeBlog')->name('home.blog');

});
        #Footer-all routes
        Route::controller(FooterController::class)->group(function(){
            #Home
            Route::get('footer/all', 'FooterAll')->name('footer.all');
            Route::post('update/footer', 'UpdateFooter')->name('update.footer');

    });
        #Contact-all routes
        Route::controller(ContactController::class)->group(function(){
            #Home
            Route::get('/contact', 'Contact')->name('contact.page');
            Route::post('/store/message', 'StoreMessage')->name('store.message');
            Route::get('/contact/all', 'ContactAll')->name('contact.all');
            Route::get('/delete/contact/{id}', 'DeleteContact')->name('delete.contact');


        });







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
