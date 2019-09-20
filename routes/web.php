<?php
// Route::get('/email', function() {
//   return new App\Mail\LoginCredentials(App\User::first(), 'asd5494sddsdf');
// });


Route::get('/', 'IndexController@index')->name('index');
Route::get('/sobre-mi', 'IndexController@aboutMe')->name('about');
Route::get('/contacto', 'IndexController@contact')->name('contact');
Route::post('/contacto', 'IndexController@sendEmail');

Route::get('/proyectos', 'IndexController@projects')->name('projects.index');
Route::get('/proyectos/categoria/{category}', 'IndexController@categoryProjects')->name('projects.categories');
Route::get('/proyectos/{project}', 'IndexController@showProject')->name('projects.show');

Route::get('/blog', 'IndexController@blog')->name('blog.index');
Route::get('/blog/{post}', 'IndexController@showBlogPost')->name('blog.show');
Route::get('/blog/categoria/{category}', 'IndexController@categories')->name('blog.categories');
Route::get('/blog/tags/{tag}', 'IndexController@tags')->name('blog.tags');

Route::get('/descargar/{career}', 'DownloadFileController@download')->name('download');



Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function() {
  Route::get('/', 'AdminController@index')->name('admin.index');

  Route::get('/proyectos/categorias', 'ProjectsCategoriesController@index')->name('admin.projects.categories.index')->middleware('permission:Ver categorias de proyectos');
  Route::get('/proyectos/categorias/{category}/editar', 'ProjectsCategoriesController@edit')->name('admin.projects.categories.edit');
  Route::put('/proyectos/categorias/{category}/editar', 'ProjectsCategoriesController@update')->name('admin.projects.categories.update');
  Route::delete('/proyectos/categorias/{category}', 'ProjectsCategoriesController@destroy')->name('admin.projects.categories.destroy');

  Route::get('/proyectos', 'ProjectsController@index')->name('admin.projects.index')->middleware('permission:Ver proyectos');
  Route::get('/proyectos/crear', 'ProjectsController@create')->name('admin.projects.create')->middleware('permission:Crear proyectos');
  Route::post('/proyectos/crear', 'ProjectsController@store')->name('admin.projects.store');
  Route::get('/proyectos/{project}/editar', 'ProjectsController@edit')->name('admin.projects.edit');
  Route::put('/proyectos/{project}/editar', 'ProjectsController@update')->name('admin.projects.update');
  Route::delete('/proyectos/{project}/eliminar', 'ProjectsController@destroy')->name('admin.projects.destroy');

  Route::get('/curriculum', 'CareerController@index')->name('admin.cv.index')->middleware('permission:Ver curriculum');
  Route::get('/curriculum/{career}/editar', 'CareerController@edit')->name('admin.cv.edit');
  Route::put('/curriculum/{career}/editar', 'CareerController@update')->name('admin.cv.update');

  Route::get('/publicaciones/{tag}/tags', 'TagsController@edit')->name('admin.posts.tags.edit');
  Route::put('/publicaciones/{tag}/tags', 'TagsController@update')->name('admin.posts.tags.update');
  Route::delete('/publicaciones/tags/{tag}', 'TagsController@destroy')->name('admin.posts.tags.destroy');
  Route::get('/publicaciones/tags', 'TagsController@index')->name('admin.posts.tags.index')->middleware('permission:Ver tags');

  Route::get('/publicaciones/categorias', 'CategoriesController@index')->name('admin.categories.index')->middleware('permission:Ver categorías');
  Route::get('/publicaciones/categorias/crear', 'CategoriesController@create')->name('admin.categories.create')->middleware('permission:Crear categorías');
  Route::post('/publicaciones/categorias/crear', 'CategoriesController@store');
  Route::get('/publicaciones/categorias/{category}/editar', 'CategoriesController@edit')->name('admin.categories.edit');
  Route::put('/publicaciones/categorias/{category}/editar', 'CategoriesController@update');
  Route::delete('/publicaciones/categorias/{category}', 'CategoriesController@destroy')->name('admin.categories.destroy');

  Route::get('/publicaciones', 'PostsController@index')->name('admin.posts.index')->middleware('permission:Ver publicaciones');
  Route::get('/publicaciones/crear', 'PostsController@create')->name('admin.posts.create')->middleware('permission:Crear publicaciones');
  Route::post('/publicaciones/crear', 'PostsController@store')->name('admin.posts.store');
  Route::get('/publicaciones/{post}', 'PostsController@show')->name('admin.posts.show');
  Route::get('/publicaciones/{post}/editar', 'PostsController@edit')->name('admin.posts.edit');
  Route::put('/publicaciones/{post}/editar', 'PostsController@update')->name('admin.posts.update');
  Route::delete('/publicaciones/{post}/eliminar', 'PostsController@destroy')->name('admin.posts.destroy');

  Route::get('/usuarios', 'UsersController@index')->name('admin.users.index')->middleware('permission:Ver usuarios');
  Route::get('/usuarios/crear', 'UsersController@create')->name('admin.users.create')->middleware('permission:Crear usuarios');
  Route::post('/usuarios/crear', 'UsersController@store')->name('admin.users.store');
  Route::get('/usuarios/{user}', 'UsersController@show')->name('admin.users.show');
  Route::get('/usuarios/{user}/editar', 'UsersController@edit')->name('admin.users.edit');
  Route::put('/usuarios/{user}/editar', 'UsersController@update')->name('admin.users.update');
  Route::delete('/usuarios/{user}', 'UsersController@destroy')->name('admin.users.destroy');

  Route::get('/roles', 'RolesController@index')->name('admin.roles.index')->middleware('permission:Ver roles');
  Route::get('/roles/crear', 'RolesController@create')->name('admin.roles.create')->middleware('permission:Crear roles');
  Route::post('/roles/crear', 'RolesController@store')->name('admin.roles.store');
  Route::get('/roles/{role}', 'RolesController@show')->name('admin.roles.show');
  Route::get('/roles/{role}/editar', 'RolesController@edit')->name('admin.roles.edit');
  Route::put('/roles/{role}/editar', 'RolesController@update')->name('admin.roles.update');
  Route::delete('/roles/{role}', 'RolesController@destroy')->name('admin.roles.destroy');

  Route::middleware('role:Administrador')->put('/usuarios/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
  Route::middleware('role:Administrador')->put('/usuarios/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');

  // PROVISIONAL
  Route::middleware('role:Administrador')->post('/usuarios/roles/crear', 'UsersPermissionsController@store')->name('admin.users.permissions.store');

});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');