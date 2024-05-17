<?php

use App\Http\Controllers\BurgerBackController;
use App\Http\Controllers\BurgerFrontController;
use App\Http\Controllers\BurgerImageController;
use App\Http\Controllers\IngredientBackController;
use App\Http\Controllers\IngredientFrontController;
use App\Http\Controllers\IngredientImageController;
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
                "front.page.order.amountColumn" => "order amount",
                "front.page.order.receipttitle" => "Your order",
                "front.page.register" => "Register",
                "front.page.register.submit" => "Make your account",
                "front.page.login" => "Login",
                "front.page.login.submit" => "Log in",
                "front.page.admin" => "Admin panel",
                "front.alt.atmosphericphoto" => "Atmospheric photo",
                "front.itemselection.action.item" => "Order",
                "front.itemselection.noingredients" => "(no ingredients)",
                "front.itemselection.continue" => "Continue",
                "front.itemselection.action.order" => "Order",
                "front.itemselection.subtotal" => "Subtotal",

                "backoffice.sidebar.home" => "Return to home page",
                "backoffice.sidebar.nav.ingredients" => "Ingredients",
                "backoffice.sidebar.nav.burgers" => "Burgers",
                "backoffice.sidebar.profile.text" => "Logged in as",
                "backoffice.itemselection.title.unnamed" => "<unnamed item>",
                "backoffice.itemselection.action.delete" => "Delete",
                "backoffice.itemselection.action.cancel" => "Cancel",
                "backoffice.itemselection.action.save" => "Save",
                "backoffice.itemselection.action.new" => "New Item",
                "backoffice.itemselection.action.item" => "Edit",
                "backoffice.itemselection.image.dragdropupload" => "Drag and drop to upload",
                "backoffice.itemselection.image.dropupload" => "Drop to upload",
                "backoffice.itemselection.image.select" => "Select image",

                "general.placeholder.searchbar" => "Search…",
                "general.setting.locale" => "Set the current locale",
                "general.itemselection.controlbar.page" => "Page:",
                "general.itemselection.controlbar.previousPage" => "Previous page",
                "general.itemselection.controlbar.nextPage" => "Next page",
                "general.itemselection.controlbar.perPage" => "Per page:",
                "general.itemselection.controlbar.filter" => "Filter",
                "general.itemselection.image.unavailable" => "No image available",
                "general.itemselection.noitems" => "No items available. Please try changing your filters.",
                "general.itemselection.column.action" => "action",
                "general.itemselection.column.thumbnail" => "thumbnail",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarian",
                "general.itemselection.column.ingredients.price" => "price (€)",
                "general.itemselection.column.ingredients.name" => "name",
                "general.itemselection.column.ingredients.description" => "description",
                "general.itemselection.column.burgers.id" => "ID",
                "general.itemselection.column.burgers.price" => "price (€)",
                "general.itemselection.column.burgers.name" => "name",
                "general.itemselection.column.burgers.description" => "description",
                "general.itemselection.column.burgers.ingredients" => "ingredients",
                "general.form.name" => "Name:",
                "general.form.email" => "Email address:",
                "general.form.password" => "Password:",
                "general.form.passwordconfirmation" => "Confirm your password:",
                "general.action.closedialog" => "Close dialog",
                "general.action.profile.logout" => "Log out",
                
            ],
            "nl" => [
                "front.page.home" => "Startpagina",
                "front.page.home.intro" => "Ik heb graag een...",
                "front.page.home.cta" => "Bestellen maar!",
                "front.page.order" => "Bestellen",
                "front.page.order.amountColumn" => "bestelbedrag",
                "front.page.order.receipttitle" => "Uw bestelling",
                "front.page.register" => "Registreren",
                "front.page.register.submit" => "Maak je account aan",
                "front.page.login" => "Inloggen",
                "front.page.login.submit" => "Inloggen",
                "front.page.admin" => "Beheerderspaneel",
                "front.alt.atmosphericphoto" => "Atmosferische foto",
                "front.itemselection.action.item" => "Bestellen",
                "front.itemselection.noingredients" => "(geen ingrediënten)",
                "front.itemselection.continue" => "Doorgaan",
                "front.itemselection.action.order" => "Bestellen",
                "front.itemselection.subtotal" => "Subtotaal",

                "backoffice.sidebar.home" => "Terug naar de startpagina",
                "backoffice.sidebar.nav.ingredients" => "Ingrediënten",
                "backoffice.sidebar.nav.burgers" => "Burgers",
                "backoffice.sidebar.profile.text" => "Ingelogd als",
                "backoffice.itemselection.title.unnamed" => "<onbenoemd item>",
                "backoffice.itemselection.action.delete" => "Verwijderen",
                "backoffice.itemselection.action.cancel" => "Annuleren",
                "backoffice.itemselection.action.save" => "Opslaan",
                "backoffice.itemselection.action.new" => "Nieuw Item",
                "backoffice.itemselection.action.item" => "Bijwerken",
                "backoffice.itemselection.image.dragdropupload" => "Sleep en laat los om te uploaden",
                "backoffice.itemselection.image.dropupload" => "Laat hier los om te uploaden",
                "backoffice.itemselection.image.select" => "Afbeelding selecteren",

                "general.placeholder.searchbar" => "Zoeken...",
                "general.setting.locale" => "Stel de huidige taal in",
                "general.itemselection.controlbar.page" => "Pagina:",
                "general.itemselection.controlbar.previousPage" => "Vorige pagina",
                "general.itemselection.controlbar.nextPage" => "Volgende pagina",
                "general.itemselection.controlbar.perPage" => "Per pagina:",
                "general.itemselection.controlbar.filter" => "Filteren",
                "general.itemselection.image.unavailable" => "Geen afbeelding beschikbaar",
                "general.itemselection.noitems" => "Geen items beschikbaar. Probeer je filters te veranderen.",
                "general.itemselection.column.action" => "actie",
                "general.itemselection.column.thumbnail" => "afbeelding",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarisch",
                "general.itemselection.column.ingredients.price" => "prijs (€)",
                "general.itemselection.column.ingredients.name" => "naam",
                "general.itemselection.column.ingredients.description" => "beschrijving",
                "general.itemselection.column.burgers.id" => "ID",
                "general.itemselection.column.burgers.price" => "prijs (€)",
                "general.itemselection.column.burgers.name" => "naam",
                "general.itemselection.column.burgers.description" => "beschrijving",
                "general.itemselection.column.burgers.ingredients" => "ingrediënten",
                "general.form.name" => "Naam:",
                "general.form.email" => "E-mailadres:",
                "general.form.password" => "Wachtwoord:",
                "general.form.passwordconfirmation" => "Bevestig je wachtwoord:",
                "general.action.closedialog" => "Dialoogvenster sluiten",
                "general.action.profile.logout" => "Uitloggen",

            ],
            "fr" => [
                "front.page.home" => "Accueil",
                "front.page.home.intro" => "J'aimerais une...",
                "front.page.home.cta" => "Allons commander !",
                "front.page.order" => "Commander",
                "front.page.order.amountColumn" => "montant de la commande",
                "front.page.order.receipttitle" => "Votre commande",
                "front.page.register" => "S'inscrire",
                "front.page.register.submit" => "Créer votre compte",
                "front.page.login" => "Se connecter",
                "front.page.login.submit" => "Se connecter",
                "front.page.admin" => "Panneau d'administration",
                "front.alt.atmosphericphoto" => "Photo atmosphérique",
                "front.itemselection.action.item" => "Commander",
                "front.itemselection.noingredients" => "(aucun ingrédient)",
                "front.itemselection.continue" => "Continuer",
                "front.itemselection.action.order" => "Commander",
                "front.itemselection.subtotal" => "Sous-total",

                "backoffice.sidebar.home" => "Retour à la page d'accueil",
                "backoffice.sidebar.nav.ingredients" => "Ingrédients",
                "backoffice.sidebar.nav.burgers" => "Burgers",
                "backoffice.sidebar.profile.text" => "Connecté en tant que",
                "backoffice.itemselection.title.unnamed" => "<item non nommé>",
                "backoffice.itemselection.action.delete" => "Supprimer",
                "backoffice.itemselection.action.cancel" => "Annuler",
                "backoffice.itemselection.action.save" => "Enregistrer",
                "backoffice.itemselection.action.new" => "Nouvel élément",
                "backoffice.itemselection.action.item" => "Modifier",
                "backoffice.itemselection.image.dragdropupload" => "Glisser et déposer pour télécharger",
                "backoffice.itemselection.image.dropupload" => "Déposez ici pour télécharger",
                "backoffice.itemselection.image.select" => "Sélectionner une image",

                "general.placeholder.searchbar" => "Recherche…",
                "general.setting.locale" => "Définir la locale actuelle",
                "general.itemselection.controlbar.page" => "Page :",
                "general.itemselection.controlbar.previousPage" => "Page précédente",
                "general.itemselection.controlbar.nextPage" => "Page suivante",
                "general.itemselection.controlbar.perPage" => "Par page :",
                "general.itemselection.controlbar.filter" => "Filtrer",
                "general.itemselection.image.unavailable" => "Aucune image disponible",
                "general.itemselection.noitems" => "Aucun article disponible. Essayez de modifier vos filtres.",
                "general.itemselection.column.action" => "action",
                "general.itemselection.column.thumbnail" => "image",
                "general.itemselection.column.ingredients.id" => "ID",
                "general.itemselection.column.ingredients.vegetarian" => "vegetarien",
                "general.itemselection.column.ingredients.price" => "prix (€)",
                "general.itemselection.column.ingredients.name" => "nom",
                "general.itemselection.column.ingredients.description" => "description",
                "general.itemselection.column.burgers.id" => "ID",
                "general.itemselection.column.burgers.price" => "prix (€)",
                "general.itemselection.column.burgers.name" => "nom",
                "general.itemselection.column.burgers.description" => "description",
                "general.itemselection.column.burgers.ingredients" => "ingrédients",
                "general.form.name" => "Nom :",
                "general.form.email" => "Adresse email :",
                "general.form.password" => "Mot de passe :",
                "general.form.passwordconfirmation" => "Confirmez votre mot de passe :",
                "general.action.closedialog" => "Fermer la boîte de dialogue",
                "general.action.profile.logout" => "Se déconnecter",

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
        Route::get('ingredients/{id}/thumbnail', [IngredientImageController::class, 'get']);

        Route::get('burgers', [BurgerFrontController::class, 'all']);
        Route::get('burgers/{id}', [BurgerFrontController::class, 'find']);
        Route::get('burgers/{id}/thumbnail', [BurgerImageController::class, 'get']);

        Route::group([
            'middleware' => ["auth.admin"],
            'prefix' => '/admin'
        ], function() {
            Route::get('ingredients', [IngredientBackController::class, 'all']);
            Route::get('ingredients/{id}', [IngredientBackController::class, 'find']);
            Route::put('ingredients/{id}', [IngredientBackController::class, 'update']);
            Route::delete('ingredients/{id}', [IngredientBackController::class, 'delete']);
            Route::post('ingredients/{id}/thumbnail', [IngredientImageController::class, 'upload']);
            Route::post('ingredients', [IngredientBackController::class, 'create']);

            Route::get('burgers', [BurgerBackController::class, 'all']);
            Route::get('burgers/{id}', [BurgerBackController::class, 'find']);
            Route::put('burgers/{id}', [BurgerBackController::class, 'update']);
            Route::delete('burgers/{id}', [BurgerBackController::class, 'delete']);
            Route::post('burgers/{id}/thumbnail', [BurgerImageController::class, 'upload']);
            Route::post('burgers', [BurgerBackController::class, 'create']);
        });
    });
});
