<?php

use App\Http\Controllers\IngredientBackController;
use App\Http\Controllers\IngredientFrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('language')->group(function () {
    Route::get('/translations', function(){
        $lang = app()->getLocale();
    
        $translations = [
            "en" => [
                "front.page.home" => "Home",
                "front.page.home.intro" => "I would love a…",
                "front.page.home.cta" => "Let's order!",
                "front.page.order" => "Order",
                "front.page.order.amountColumn" => "Order amount",
                "front.page.order.receipttitle" => "Your order",
                "front.page.register" => "Register",
                "front.page.register.submit" => "Make your account",
                "front.page.login" => "Login",
                "front.page.login.submit" => "Log in",
                "front.alt.atmosphericphoto" => "Atmospheric photo",
                "general.placeholder.searchbar" => "Search…",
                "general.setting.locale" => "Set the current locale",
                "general.itemselection.controlbar.page" => "Page:",
                "general.itemselection.controlbar.previousPage" => "Previous page",
                "general.itemselection.controlbar.nextPage" => "Next page",
                "general.itemselection.controlbar.perPage" => "Per page:",
                "general.itemselection.controlbar.filter" => "Filter",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarian",
                "general.itemselection.column.ingredients.price" => "price",
                "general.itemselection.column.ingredients.name" => "name",
                "general.itemselection.column.ingredients.description" => "description",
                "general.form.name" => "Name:",
                "general.form.email" => "Email address:",
                "general.form.password" => "Password:",
                "general.form.passwordconfirmation" => "Confirm your password:",

            ],
            "nl" => [
                "front.page.home" => "Startpagina",
                "front.page.home.intro" => "Ik heb graag een...",
                "front.page.home.cta" => "Bestellen maar!",
                "front.page.order" => "Bestellen",
                "front.page.order.amountColumn" => "Bestelbedrag",
                "front.page.order.receipttitle" => "Uw bestelling",
                "front.page.register" => "Registreren",
                "front.page.register.submit" => "Maak je account aan",
                "front.page.login" => "Inloggen",
                "front.page.login.submit" => "Inloggen",
                "front.alt.atmosphericphoto" => "Atmosferische foto",
                "general.placeholder.searchbar" => "Zoeken...",
                "general.setting.locale" => "Stel de huidige taal in",
                "general.itemselection.controlbar.page" => "Pagina:",
                "general.itemselection.controlbar.previousPage" => "Vorige pagina",
                "general.itemselection.controlbar.nextPage" => "Volgende pagina",
                "general.itemselection.controlbar.perPage" => "Per pagina:",
                "general.itemselection.controlbar.filter" => "Filteren",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarisch",
                "general.itemselection.column.ingredients.price" => "prijs",
                "general.itemselection.column.ingredients.name" => "naam",
                "general.itemselection.column.ingredients.description" => "beschrijving",
                "general.form.name" => "Naam:",
                "general.form.email" => "E-mailadres:",
                "general.form.password" => "Wachtwoord:",
                "general.form.passwordconfirmation" => "Bevestig je wachtwoord:",
            ],
            "fr" => [
                "front.page.home" => "Accueil",
                "front.page.home.intro" => "J'aimerais une...",
                "front.page.home.cta" => "Allons commander !",
                "front.page.order" => "Commander",
                "front.page.order.amountColumn" => "Montant de la commande",
                "front.page.order.receipttitle" => "Votre commande",
                "front.page.register" => "S'inscrire",
                "front.page.register.submit" => "Créer votre compte",
                "front.page.login" => "Se connecter",
                "front.page.login.submit" => "Se connecter",
                "front.alt.atmosphericphoto" => "Photo atmosphérique",
                "general.placeholder.searchbar" => "Recherche…",
                "general.setting.locale" => "Définir la locale actuelle",
                "general.itemselection.controlbar.page" => "Page :",
                "general.itemselection.controlbar.previousPage" => "Page précédente",
                "general.itemselection.controlbar.nextPage" => "Page suivante",
                "general.itemselection.controlbar.perPage" => "Par page :",
                "general.itemselection.controlbar.filter" => "Filtrer",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarien",
                "general.itemselection.column.ingredients.price" => "prix",
                "general.itemselection.column.ingredients.name" => "nom",
                "general.itemselection.column.ingredients.description" => "description",
                "general.form.name" => "Nom :",
                "general.form.email" => "Adresse email :",
                "general.form.password" => "Mot de passe :",
                "general.form.passwordconfirmation" => "Confirmez votre mot de passe :",
            ]
        ];
    
        return $translations[$lang];
    });

    Route::post('register', [JwtAuthController::class, 'register']);
    Route::post('login', [JwtAuthController::class, 'login']);
    
    Route::group([
        'middleware' => ["auth.csrf.jwt", "auth:api"]
    ], function() {
        Route::get('profile', [JwtAuthController::class, 'profile']);
        Route::post('refresh', [JwtAuthController::class, 'refreshToken']);
        Route::post('logout', [JwtAuthController::class, 'logout']);

        Route::get('ingredients', [IngredientFrontController::class, 'all']);
        Route::get('ingredients/{id}', [IngredientFrontController::class, 'find']);

        Route::group([
            'middleware' => ["auth.admin"],
            'prefix' => '/admin'
        ], function() {
            Route::get('ingredients', [IngredientBackController::class, 'all']);
            Route::get('ingredients/{id}', [IngredientBackController::class, 'find']);
            Route::put('ingredients/{id}', [IngredientBackController::class, 'update']);
            Route::delete('ingredients/{id}', [IngredientBackController::class, 'delete']);
            Route::post('ingredients', [IngredientBackController::class, 'create']);
        });
    });
});
