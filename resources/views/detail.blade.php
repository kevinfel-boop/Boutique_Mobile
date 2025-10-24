<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Produit - Smartphone X100</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .product-image {
            transition: transform 0.3s ease;
        }
        .product-image:hover {
            transform: scale(1.02);
        }
        .color-option {
            transition: all 0.2s ease;
        }
        .color-option.active {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Boutique Élégante</h1>
        </header>

        <!-- Contenu principal -->
        <main class="max-w-6xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Image du produit -->
                    <div class="md:w-1/2 p-6">
                        <div class="relative">
                            <img src="{{$product->image}}" 
                                 alt="Smartphone X100" 
                                 class="w-full h-96 object-cover rounded-xl product-image">
                            <span class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                En Stock
                            </span>
                        </div>
                        
                        <!-- Galerie d'images secondaires -->
                        <div class="flex mt-4 space-x-4">
                            <div class="w-1/4">
                                <img src="{{$product->image}}" 
                                     alt="Vue de face" 
                                     class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-gray-200 hover:border-blue-500">
                            </div>
                            <div class="w-1/4">
                                <img src="{{$product->image}}" 
                                     alt="Vue de dos" 
                                     class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-gray-200 hover:border-blue-500">
                            </div>
                            <div class="w-1/4">
                                <img src="{{$product->image}}" 
                                     alt="Détails" 
                                     class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-gray-200 hover:border-blue-500">
                            </div>
                            <div class="w-1/4">
                                <img src="{{$product->image}}" 
                                     alt="Accessoires" 
                                     class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 border-gray-200 hover:border-blue-500">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Détails du produit -->
                    <div class="md:w-1/2 p-6">
                        <!-- Catégorie -->
                        <div class="mb-4">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">
                                Électronique
                            </span>
                        </div>
                        
                        <!-- Nom du produit -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Smartphone X100</h1>
                        
                        <!-- Prix -->
                        <div class="flex items-center mb-4">
                            <span class="text-2xl font-bold text-gray-900">899,99 €</span>
                        </div>
                        
                        <!-- Évaluation -->
                        <div class="flex items-center mb-6">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 ml-2">4.5 (128 avis)</span>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                            <p class="text-gray-600">
                                Téléphone intelligent dernière génération. Ce smartphone allie design moderne et fonctionnalités avancées. 
                                Doté d'un processeur haute performance, d'un appareil photo professionnel et d'une batterie longue durée, 
                                il est parfait pour toutes vos activités quotidiennes.
                            </p>
                        </div>
                        
                        <!-- Caractéristiques -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Caractéristiques</h2>
                            <ul class="text-gray-600 list-disc pl-5 space-y-1">
                                <li>Écran 6.7 pouces Super Retina</li>
                                <li>Processeur Octa-core 2.8 GHz</li>
                                <li>Appareil photo triple 48MP + 12MP + 12MP</li>
                                <li>Batterie 4500 mAh avec charge rapide</li>
                                <li>Garantie 2 ans</li>
                            </ul>
                        </div>
                        
                        <!-- Options -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Couleur</h2>
                            <div class="flex space-x-3">
                                <button class="w-10 h-10 rounded-full bg-gray-800 border-2 border-gray-300 color-option active"></button>
                                <button class="w-10 h-10 rounded-full bg-blue-900 border-2 border-gray-300 color-option"></button>
                                <button class="w-10 h-10 rounded-full bg-red-700 border-2 border-gray-300 color-option"></button>
                                <button class="w-10 h-10 rounded-full bg-green-800 border-2 border-gray-300 color-option"></button>
                            </div>
                        </div>
                        
                        <!-- Stock -->
                        <div class="mb-6">
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>En stock - Livraison sous 24h</span>
                            </div>
                        </div>
                        
                        <!-- Quantité et Boutons -->
                        <div class="flex items-center mb-6">
                            <div class="mr-4">
                                <span class="text-gray-700 mr-2">Quantité:</span>
                                <div class="inline-flex border border-gray-300 rounded-md">
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-l-md">-</button>
                                    <span class="px-4 py-1">1</span>
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-r-md">+</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="flex space-x-4">
                            <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Ajouter au panier
                            </button>
                            <button class="w-12 h-12 flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition duration-300">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                        </div>
                        
                        <!-- Informations supplémentaires -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-shipping-fast mr-2"></i>
                                <span>Livraison gratuite</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 mt-2">
                                <i class="fas fa-undo-alt mr-2"></i>
                                <span>Retour gratuit sous 30 jours</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 mt-2">
                                <i class="fas fa-shield-alt mr-2"></i>
                                <span>Garantie 2 ans incluse</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section produits similaires -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produits similaires</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Produit 1 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8" 
                             alt="Ordinateur Portable Z15" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1">Ordinateur Portable Z15</h3>
                            <p class="text-gray-600 text-sm mb-2">Ordinateur portable léger et puissant.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-900 font-bold">1299,00 €</span>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produit 2 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.unsplash.com/photo-1512499617640-c2f999018b72" 
                             alt="Casque Bluetooth A50" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1">Casque Bluetooth A50</h3>
                            <p class="text-gray-600 text-sm mb-2">Casque sans fil à réduction de bruit.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-900 font-bold">199,90 €</span>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produit 3 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.unsplash.com/photo-1508898578281-774ac4893a2d" 
                             alt="Caméra 4K Pro" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1">Caméra 4K Pro</h3>
                            <p class="text-gray-600 text-sm mb-2">Caméra 4K ultra haute définition.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-900 font-bold">749,00 €</span>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produit 4 -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b" 
                             alt="Montre Connectée S2" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-1">Montre Connectée S2</h3>
                            <p class="text-gray-600 text-sm mb-2">Montre connectée avec capteur cardiaque.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-900 font-bold">249,99 €</span>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Script pour gérer la sélection des couleurs
        document.addEventListener('DOMContentLoaded', function() {
            const colorOptions = document.querySelectorAll('.color-option');
            
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Retirer la classe active de toutes les options
                    colorOptions.forEach(opt => opt.classList.remove('active'));
                    // Ajouter la classe active à l'option cliquée
                    this.classList.add('active');
                });
            });
            
            // Gestion de la quantité
            const minusBtn = document.querySelector('.inline-flex button:first-child');
            const plusBtn = document.querySelector('.inline-flex button:last-child');
            const quantitySpan = document.querySelector('.inline-flex span');
            
            minusBtn.addEventListener('click', function() {
                let quantity = parseInt(quantitySpan.textContent);
                if (quantity > 1) {
                    quantitySpan.textContent = quantity - 1;
                }
            });
            
            plusBtn.addEventListener('click', function() {
                let quantity = parseInt(quantitySpan.textContent);
                quantitySpan.textContent = quantity + 1;
            });
        });
    </script>
</body>
</html>