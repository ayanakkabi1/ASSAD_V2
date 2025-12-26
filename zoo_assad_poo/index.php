<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Virtuel ASSAD - Coupe d'Afrique des Nations 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a365d',
                        secondary: '#2d3748',
                        accent: '#d69e2e',
                        success: '#38a169',
                        danger: '#e53e3e',
                        info: '#3182ce',
                        light: '#f7fafc',
                        dark: '#1a202c'
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #d69e2e;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .active-link::after {
            width: 100%;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background-color: #1a365d;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #2d4a7c;
        }
        
        .btn-accent {
            background-color: #d69e2e;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }
        
        .btn-accent:hover {
            background-color: #b8860b;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(26, 54, 93, 0.9) 0%, rgba(45, 55, 72, 0.8) 100%);
        }
        
        .animal-card {
            height: 100%;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .stats-card {
            border-left: 4px solid #d69e2e;
        }
        
        .step-visit {
            position: relative;
            padding-left: 1.5rem;
        }
        
        .step-visit::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: #e2e8f0;
        }
        
        .step-visit:last-child::before {
            height: 50%;
        }
        
        .step-visit:first-child::before {
            top: 50%;
        }
        
        .step-number {
            width: 2rem;
            height: 2rem;
            background-color: #d69e2e;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: -0.75rem;
            top: 0;
            z-index: 1;
        }
        
        /* Animation pour le carrousel */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        /* Animation pour les cartes */
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .slide-up {
            animation: slideUp 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="bg-accent p-2 rounded-lg">
                        <i class="fas fa-paw text-white text-2xl"></i>
                    </div>
                    <a href="#" class="text-white text-2xl font-bold">ASSAD</a>
                    <span class="text-accent text-sm font-semibold bg-white px-2 py-1 rounded">CAN 2025</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#accueil" class="nav-link text-white font-medium active-link">Accueil</a>
                    <a href="#animaux" class="nav-link text-white font-medium">Animaux</a>
                    <a href="#visites" class="nav-link text-white font-medium">Visites guidées</a>
                    <a href="#lion" class="nav-link text-white font-medium">Lion de l'Atlas</a>
                    <a href="#stats" class="nav-link text-white font-medium">Statistiques</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- User menu -->
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center space-x-2 text-white focus:outline-none">
                            <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <span class="hidden md:block">Visiteur</span>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </button>
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Mon profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-calendar mr-2"></i>Mes réservations</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-comment mr-2"></i>Mes commentaires</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-danger hover:bg-gray-100"><i class="fas fa-sign-out-alt mr-2"></i>Déconnexion</a>
                        </div>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-gray-700">
                <a href="#accueil" class="block py-2 text-white font-medium">Accueil</a>
                <a href="#animaux" class="block py-2 text-white font-medium">Animaux</a>
                <a href="#visites" class="block py-2 text-white font-medium">Visites guidées</a>
                <a href="#lion" class="block py-2 text-white font-medium">Lion de l'Atlas</a>
                <a href="#stats" class="block py-2 text-white font-medium">Statistiques</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="hero-gradient text-white py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 slide-up">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue au Zoo Virtuel <span class="text-accent">ASSAD</span></h1>
                    <p class="text-xl mb-6">Découvrez les merveilles de la faune africaine à l'occasion de la Coupe d'Afrique des Nations 2025 au Maroc</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#visites" class="btn-accent font-semibold"><i class="fas fa-calendar-alt mr-2"></i>Réserver une visite</a>
                        <a href="#animaux" class="bg-white text-primary font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition"><i class="fas fa-search mr-2"></i>Explorer les animaux</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center slide-up">
                    <div class="relative">
                        <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-accent shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Lion de l'Atlas" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-accent text-white p-4 rounded-lg shadow-lg">
                            <p class="font-bold text-lg">Asaad</p>
                            <p class="text-sm">Lion de l'Atlas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Lion de l'Atlas -->
    <section id="lion" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 slide-up">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Asaad - Le Lion de l'Atlas</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Découvrez la majesté du lion de l'Atlas, emblème du Maroc et fierté du continent africain</p>
            </div>
            
            <div class="flex flex-col lg:flex-row gap-8 slide-up">
                <div class="lg:w-2/3">
                    <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                        <h3 class="text-2xl font-bold text-primary mb-4">Présentation</h3>
                        <p class="text-gray-700 mb-4">Le lion de l'Atlas (Panthera leo leo), également appelé lion de Barbarie, est une sous-espèce de lion originaire d'Afrique du Nord. Il est considéré comme éteint à l'état sauvage depuis le milieu du 20ème siècle.</p>
                        <p class="text-gray-700 mb-4">Ce lion se distingue par sa crinière plus épaisse et plus sombre que les autres sous-espèces, s'étendant souvent sur le ventre. Les mâles peuvent atteindre un poids de 200 à 250 kg.</p>
                        <p class="text-gray-700 mb-6">Le lion de l'Atlas est un symbole de puissance et de royauté dans la culture marocaine et maghrébine. Il figure notamment sur l'emblème du Maroc.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-bold text-primary mb-2"><i class="fas fa-map-marker-alt text-accent mr-2"></i>Habitat historique</h4>
                                <p class="text-gray-700">Montagnes de l'Atlas au Maroc, d'où son nom</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-bold text-primary mb-2"><i class="fas fa-exclamation-triangle text-accent mr-2"></i>Statut de conservation</h4>
                                <p class="text-gray-700">Éteint à l'état sauvage, captivité uniquement</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-bold text-primary mb-2"><i class="fas fa-utensils text-accent mr-2"></i>Alimentation</h4>
                                <p class="text-gray-700">Carnivore (gazelles, sangliers, mouflons)</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow">
                                <h4 class="font-bold text-primary mb-2"><i class="fas fa-weight text-accent mr-2"></i>Taille & Poids</h4>
                                <p class="text-gray-700">2-2.5m de long, 200-250kg (mâle)</p>
                            </div>
                        </div>
                        
                        <!-- Carrousel d'images -->
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-primary mb-4">Galerie du Lion de l'Atlas</h4>
                            <div class="relative h-64 md:h-80 rounded-lg overflow-hidden">
                                <div id="carousel" class="h-full flex transition-transform duration-500 ease-in-out">
                                    <div class="carousel-slide flex-shrink-0 w-full h-full">
                                        <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Lion de l'Atlas" class="w-full h-full object-cover">
                                    </div>
                                    <div class="carousel-slide flex-shrink-0 w-full h-full">
                                        <img src="https://images.unsplash.com/photo-1519066629447-267fffa62d4b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Lion de l'Atlas 2" class="w-full h-full object-cover">
                                    </div>
                                    <div class="carousel-slide flex-shrink-0 w-full h-full">
                                        <img src="https://images.unsplash.com/photo-1562552476-8acbd4e0b3c9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Lion de l'Atlas 3" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <button id="prev-btn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                                    <i class="fas fa-chevron-left text-primary"></i>
                                </button>
                                <button id="next-btn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                                    <i class="fas fa-chevron-right text-primary"></i>
                                </button>
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                    <span class="carousel-dot w-3 h-3 rounded-full bg-white cursor-pointer"></span>
                                    <span class="carousel-dot w-3 h-3 rounded-full bg-white cursor-pointer"></span>
                                    <span class="carousel-dot w-3 h-3 rounded-full bg-white cursor-pointer"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/3">
                    <div class="bg-primary text-white rounded-xl p-6 shadow-lg mb-6">
                        <h3 class="text-2xl font-bold mb-4">Visites spéciales "Lion de l'Atlas"</h3>
                        <p class="mb-6">Participez à une visite guidée exclusive dédiée au lion de l'Atlas et à son histoire fascinante.</p>
                        <ul class="space-y-3 mb-6">
                            <li><i class="fas fa-check-circle text-accent mr-2"></i>Histoire et symbolique</li>
                            <li><i class="fas fa-check-circle text-accent mr-2"></i>Projets de conservation</li>
                            <li><i class="fas fa-check-circle text-accent mr-2"></i>Rencontre virtuelle avec Asaad</li>
                            <li><i class="fas fa-check-circle text-accent mr-2"></i>Questions-réponses avec un guide expert</li>
                        </ul>
                        <a href="#" class="btn-accent font-semibold inline-block w-full text-center"><i class="fas fa-calendar-plus mr-2"></i>Réserver une visite spéciale</a>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                        <h3 class="text-2xl font-bold text-primary mb-4">Statistiques de consultation</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Consultations ce mois</span>
                                    <span class="font-bold">1,245</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-accent h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Visites réservées</span>
                                    <span class="font-bold">87</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-success h-2 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="font-medium">Note moyenne</span>
                                    <span class="font-bold">4.8/5</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-info h-2 rounded-full" style="width: 96%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Animaux -->
    <section id="animaux" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 slide-up">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Découvrez les animaux du zoo</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Explorez la diversité de la faune africaine avec nos fiches détaillées sur chaque animal</p>
            </div>
            
            <!-- Filtres -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8 slide-up">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-primary mb-4 md:mb-0">Filtrer les animaux</h3>
                    <div class="flex items-center">
                        <span class="mr-4 text-gray-700">Recherche :</span>
                        <div class="relative">
                            <input type="text" placeholder="Nom, espèce..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Habitat</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Tous les habitats</option>
                            <option value="savane">Savane</option>
                            <option value="foret">Forêt tropicale</option>
                            <option value="desert">Désert</option>
                            <option value="montagne">Montagne</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Pays d'origine</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Tous les pays</option>
                            <option value="maroc">Maroc</option>
                            <option value="senegal">Sénégal</option>
                            <option value="kenya">Kenya</option>
                            <option value="afrique_du_sud">Afrique du Sud</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Type d'animal</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Tous les types</option>
                            <option value="mammifere">Mammifère</option>
                            <option value="oiseau">Oiseau</option>
                            <option value="reptile">Reptile</option>
                            <option value="amphibien">Amphibien</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="btn-primary w-full"><i class="fas fa-filter mr-2"></i>Appliquer les filtres</button>
                    </div>
                </div>
            </div>
            
            <!-- Liste des animaux -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                <?php
                     
                ?>
                <!-- Carte animal 1 -->
                <div class="animal-card card-hover bg-white slide-up">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1550358864-518f202c02ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Éléphant d'Afrique" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-lg font-bold text-primary">Éléphant d'Afrique</h4>
                            <span class="bg-info text-white text-xs px-2 py-1 rounded-full">Vulnérable</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Loxodonta africana</p>
                        <div class="flex items-center text-gray-700 mb-3">
                            <i class="fas fa-globe-africa text-accent mr-2"></i>
                            <span class="text-sm">Kenya, Tanzanie, Botswana</span>
                        </div>
                        <div class="flex items-center text-gray-700 mb-4">
                            <i class="fas fa-home text-accent mr-2"></i>
                            <span class="text-sm">Savane et forêts</span>
                        </div>
                        <a href="#" class="text-accent font-medium text-sm hover:underline flex items-center">
                            <i class="fas fa-eye mr-1"></i> Voir la fiche complète
                        </a>
                    </div>
                </div>
                
                <!-- Carte animal 2 -->
                <div class="animal-card card-hover bg-white slide-up">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Lion de l'Atlas" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-lg font-bold text-primary">Lion de l'Atlas</h4>
                            <span class="bg-danger text-white text-xs px-2 py-1 rounded-full">Éteint à l'état sauvage</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Panthera leo leo</p>
                        <div class="flex items-center text-gray-700 mb-3">
                            <i class="fas fa-globe-africa text-accent mr-2"></i>
                            <span class="text-sm">Maroc (historique)</span>
                        </div>
                        <div class="flex items-center text-gray-700 mb-4">
                            <i class="fas fa-home text-accent mr-2"></i>
                            <span class="text-sm">Montagnes et forêts</span>
                        </div>
                        <a href="#" class="text-accent font-medium text-sm hover:underline flex items-center">
                            <i class="fas fa-eye mr-1"></i> Voir la fiche complète
                        </a>
                    </div>
                </div>
                
                <!-- Carte animal 3 -->
                <div class="animal-card card-hover bg-white slide-up">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1567177662142-20646cdc94d0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Girafe" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-lg font-bold text-primary">Girafe</h4>
                            <span class="bg-warning text-white text-xs px-2 py-1 rounded-full">En danger</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Giraffa camelopardalis</p>
                        <div class="flex items-center text-gray-700 mb-3">
                            <i class="fas fa-globe-africa text-accent mr-2"></i>
                            <span class="text-sm">Afrique subsaharienne</span>
                        </div>
                        <div class="flex items-center text-gray-700 mb-4">
                            <i class="fas fa-home text-accent mr-2"></i>
                            <span class="text-sm">Savane</span>
                        </div>
                        <a href="#" class="text-accent font-medium text-sm hover:underline flex items-center">
                            <i class="fas fa-eye mr-1"></i> Voir la fiche complète
                        </a>
                    </div>
                </div>
                
                <!-- Carte animal 4 -->
                <div class="animal-card card-hover bg-white slide-up">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1564349683136-77e08dba1ef7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Rhinocéros noir" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="text-lg font-bold text-primary">Rhinocéros noir</h4>
                            <span class="bg-danger text-white text-xs px-2 py-1 rounded-full">En danger critique</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">Diceros bicornis</p>
                        <div class="flex items-center text-gray-700 mb-3">
                            <i class="fas fa-globe-africa text-accent mr-2"></i>
                            <span class="text-sm">Afrique orientale et australe</span>
                        </div>
                        <div class="flex items-center text-gray-700 mb-4">
                            <i class="fas fa-home text-accent mr-2"></i>
                            <span class="text-sm">Savane et broussailles</span>
                        </div>
                        <a href="#" class="text-accent font-medium text-sm hover:underline flex items-center">
                            <i class="fas fa-eye mr-1"></i> Voir la fiche complète
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center slide-up">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 rounded-l-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="px-4 py-2 text-white bg-primary border border-gray-300">1</a>
                    <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 hover:bg-gray-50">2</a>
                    <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 hover:bg-gray-50">3</a>
                    <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 rounded-r-lg hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Section Visites guidées -->
    <section id="visites" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 slide-up">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Visites guidées virtuelles</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Réservez une visite guidée interactive et découvrez les animaux avec nos guides experts</p>
            </div>
            
            <!-- Recherche de visites -->
            <div class="bg-gray-50 rounded-xl shadow-lg p-6 mb-8 slide-up">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-primary mb-4 md:mb-0">Rechercher une visite</h3>
                    <div class="flex items-center">
                        <span class="mr-4 text-gray-700">Recherche rapide :</span>
                        <div class="relative">
                            <input type="text" placeholder="Titre, description..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Date</label>
                        <input type="date" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Langue</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Toutes les langues</option>
                            <option value="fr">Français</option>
                            <option value="ar">Arabe</option>
                            <option value="en">Anglais</option>
                            <option value="es">Espagnol</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Prix maximum</label>
                        <select class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                            <option value="">Tous les prix</option>
                            <option value="10">10€ max</option>
                            <option value="20">20€ max</option>
                            <option value="30">30€ max</option>
                            <option value="50">50€ max</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="btn-primary w-full"><i class="fas fa-search mr-2"></i>Rechercher</button>
                    </div>
                </div>
            </div>
            
            <!-- Liste des visites -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Carte visite 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover slide-up">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-primary mb-2">Safari des grands mammifères africains</h4>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-calendar-alt text-accent mr-2"></i>
                                    <span>15 Juin 2025 - 14:30</span>
                                </div>
                            </div>
                            <span class="bg-success text-white text-sm px-3 py-1 rounded-full">Disponible</span>
                        </div>
                        
                        <div class="flex flex-wrap gap-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-accent mr-2"></i>
                                <span>2 heures</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-language text-accent mr-2"></i>
                                <span>Français</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users text-accent mr-2"></i>
                                <span>15/25 places</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-euro-sign text-accent mr-2"></i>
                                <span class="font-bold">25€</span>
                            </div>
                        </div>
                        
                        <p class="text-gray-700 mb-6">Découvrez les géants de la savane africaine : éléphants, girafes, rhinocéros et bien d'autres. Cette visite guidée vous emmènera au cœur de leurs habitats naturels.</p>
                        
                        <h5 class="font-bold text-primary mb-2">Parcours de la visite :</h5>
                        <div class="mb-6">
                            <div class="step-visit pl-6 mb-4">
                                <div class="step-number">1</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Zone des éléphants</h6>
                                    <p class="text-sm text-gray-600">Découverte des éléphants d'Afrique et de leurs comportements sociaux</p>
                                </div>
                            </div>
                            <div class="step-visit pl-6 mb-4">
                                <div class="step-number">2</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Plaines de la savane</h6>
                                    <p class="text-sm text-gray-600">Observation des girafes, zèbres et antilopes dans leur habitat naturel</p>
                                </div>
                            </div>
                            <div class="step-visit pl-6">
                                <div class="step-number">3</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Zone des rhinocéros</h6>
                                    <p class="text-sm text-gray-600">Rencontre avec les rhinocéros noirs et blancs, et discussion sur leur conservation</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                                    <span class="font-bold">4.7</span>
                                    <span class="text-gray-600 text-sm ml-2">(48 avis)</span>
                                </div>
                            </div>
                            <button class="btn-accent font-semibold"><i class="fas fa-ticket-alt mr-2"></i>Réserver maintenant</button>
                        </div>
                    </div>
                </div>
                
                <!-- Carte visite 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover slide-up">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-primary mb-2">Les félins d'Afrique : des lions aux guépards</h4>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-calendar-alt text-accent mr-2"></i>
                                    <span>18 Juin 2025 - 10:00</span>
                                </div>
                            </div>
                            <span class="bg-success text-white text-sm px-3 py-1 rounded-full">Disponible</span>
                        </div>
                        
                        <div class="flex flex-wrap gap-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-accent mr-2"></i>
                                <span>1.5 heures</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-language text-accent mr-2"></i>
                                <span>Arabe</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users text-accent mr-2"></i>
                                <span>8/15 places</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-euro-sign text-accent mr-2"></i>
                                <span class="font-bold">20€</span>
                            </div>
                        </div>
                        
                        <p class="text-gray-700 mb-6">Explorez le monde fascinant des félins africains. Des lions majestueux aux guépards rapides, découvrez leurs techniques de chasse, leur vie sociale et les défis de leur conservation.</p>
                        
                        <h5 class="font-bold text-primary mb-2">Parcours de la visite :</h5>
                        <div class="mb-6">
                            <div class="step-visit pl-6 mb-4">
                                <div class="step-number">1</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Rencontre avec Asaad</h6>
                                    <p class="text-sm text-gray-600">Présentation du lion de l'Atlas, emblème du Maroc</p>
                                </div>
                            </div>
                            <div class="step-visit pl-6 mb-4">
                                <div class="step-number">2</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Territoire des lions</h6>
                                    <p class="text-sm text-gray-600">Observation d'une troupe de lions et découverte de leur hiérarchie sociale</p>
                                </div>
                            </div>
                            <div class="step-visit pl-6">
                                <div class="step-number">3</div>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h6 class="font-bold">Zone des guépards</h6>
                                    <p class="text-sm text-gray-600">Découverte de l'animal terrestre le plus rapide au monde</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                                    <span class="font-bold">4.9</span>
                                    <span class="text-gray-600 text-sm ml-2">(32 avis)</span>
                                </div>
                            </div>
                            <button class="btn-accent font-semibold"><i class="fas fa-ticket-alt mr-2"></i>Réserver maintenant</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Section commentaires -->
            <div class="mt-16 slide-up">
                <h3 class="text-2xl font-bold text-primary mb-6">Avis des visiteurs</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Commentaire 1 -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold mr-4">
                                AS
                            </div>
                            <div>
                                <h5 class="font-bold">Ahmed Saidi</h5>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-500 mr-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-gray-600 text-sm">15 Juin 2025</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">"Visite exceptionnelle ! Le guide était très connaisseur et a su répondre à toutes nos questions. La découverte du lion de l'Atlas était un moment inoubliable."</p>
                        <p class="text-sm text-gray-600">Visite : Safari des grands mammifères africains</p>
                    </div>
                    
                    <!-- Commentaire 2 -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold mr-4">
                                MF
                            </div>
                            <div>
                                <h5 class="font-bold">Marie Fontaine</h5>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-500 mr-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-gray-600 text-sm">12 Juin 2025</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">"Excellente initiative pour la CAN 2025 ! J'ai pu faire découvrir la faune africaine à mes enfants de manière interactive et éducative. Nous reviendrons certainement."</p>
                        <p class="text-sm text-gray-600">Visite : Les félins d'Afrique</p>
                    </div>
                </div>
                
                <!-- Pagination commentaires -->
                <div class="flex justify-center">
                    <nav class="inline-flex rounded-md shadow">
                        <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 rounded-l-lg hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-4 py-2 text-white bg-primary border border-gray-300">1</a>
                        <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 hover:bg-gray-50">2</a>
                        <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 hover:bg-gray-50">3</a>
                        <a href="#" class="px-4 py-2 text-primary bg-white border border-gray-300 rounded-r-lg hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistiques (Admin) -->
    <section id="stats" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 slide-up">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Tableau de bord administrateur</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Statistiques et gestion du zoo virtuel ASSAD</p>
            </div>
            
            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Statistique 1 -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-600">Visiteurs inscrits</p>
                            <h3 class="text-3xl font-bold text-primary">1,245</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-users text-primary text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-success">
                        <i class="fas fa-arrow-up mr-2"></i>
                        <span>12% depuis le mois dernier</span>
                    </div>
                </div>
                
                <!-- Statistique 2 -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-600">Animaux enregistrés</p>
                            <h3 class="text-3xl font-bold text-primary">87</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-paw text-primary text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-success">
                        <i class="fas fa-plus-circle mr-2"></i>
                        <span>5 nouveaux cette semaine</span>
                    </div>
                </div>
                
                <!-- Statistique 3 -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-600">Visites réservées</p>
                            <h3 class="text-3xl font-bold text-primary">312</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-calendar-check text-primary text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-success">
                        <i class="fas fa-arrow-up mr-2"></i>
                        <span>24% depuis le mois dernier</span>
                    </div>
                </div>
                
                <!-- Statistique 4 -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-gray-600">Revenus totaux</p>
                            <h3 class="text-3xl font-bold text-primary">6,540€</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                            <i class="fas fa-euro-sign text-primary text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-success">
                        <i class="fas fa-chart-line mr-2"></i>
                        <span>18% depuis le mois dernier</span>
                    </div>
                </div>
            </div>
            
            <!-- Graphiques et détails -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Animaux les plus consultés -->
                <div class="bg-white p-6 rounded-xl shadow-lg slide-up">
                    <h3 class="text-xl font-bold text-primary mb-6">Animaux les plus consultés</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Lion de l'Atlas</span>
                                <span class="font-bold">1,245 consultations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-accent h-2 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Éléphant d'Afrique</span>
                                <span class="font-bold">987 consultations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-accent h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Girafe</span>
                                <span class="font-bold">843 consultations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-accent h-2 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Rhinocéros noir</span>
                                <span class="font-bold">721 consultations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-accent h-2 rounded-full" style="width: 55%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Guépard</span>
                                <span class="font-bold">654 consultations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-accent h-2 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Visites les plus réservées -->
                <div class="bg-white p-6 rounded-xl shadow-lg slide-up">
                    <h3 class="text-xl font-bold text-primary mb-6">Visites les plus réservées</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Safari des grands mammifères</span>
                                <span class="font-bold">87 réservations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-success h-2 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Les félins d'Afrique</span>
                                <span class="font-bold">76 réservations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-success h-2 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Oiseaux exotiques d'Afrique</span>
                                <span class="font-bold">54 réservations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-success h-2 rounded-full" style="width: 55%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Spécial Lion de l'Atlas</span>
                                <span class="font-bold">48 réservations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-success h-2 rounded-full" style="width: 49%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="font-medium">Monde des primates</span>
                                <span class="font-bold">32 réservations</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-success h-2 rounded-full" style="width: 33%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Boutons d'administration -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 slide-up">
                <a href="#" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow text-center">
                    <div class="mb-4">
                        <i class="fas fa-user-cog text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-primary mb-2">Gérer les utilisateurs</h4>
                    <p class="text-gray-600">Activer/désactiver des comptes, approuver les guides</p>
                </a>
                
                <a href="#" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow text-center">
                    <div class="mb-4">
                        <i class="fas fa-plus-circle text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-primary mb-2">Gérer les animaux</h4>
                    <p class="text-gray-600">Ajouter, modifier ou supprimer des animaux et leurs habitats</p>
                </a>
                
                <a href="#" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow text-center">
                    <div class="mb-4">
                        <i class="fas fa-chart-bar text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-bold text-primary mb-2">Statistiques détaillées</h4>
                    <p class="text-gray-600">Visualiser des rapports détaillés et exporter les données</p>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="bg-accent p-2 rounded-lg">
                            <i class="fas fa-paw text-white"></i>
                        </div>
                        <span class="text-xl font-bold">ASSAD</span>
                    </div>
                    <p class="text-gray-300">Zoo virtuel à l'occasion de la Coupe d'Afrique des Nations 2025 au Maroc. Découvrez la faune africaine de manière interactive et éducative.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#accueil" class="text-gray-300 hover:text-accent transition">Accueil</a></li>
                        <li><a href="#animaux" class="text-gray-300 hover:text-accent transition">Animaux</a></li>
                        <li><a href="#visites" class="text-gray-300 hover:text-accent transition">Visites guidées</a></li>
                        <li><a href="#lion" class="text-gray-300 hover:text-accent transition">Lion de l'Atlas</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Informations</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt text-accent mr-2"></i>
                            <span class="text-gray-300">Maroc, Hôte de la CAN 2025</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-accent mr-2"></i>
                            <span class="text-gray-300">contact@zoo-assad.ma</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-accent mr-2"></i>
                            <span class="text-gray-300">+212 5 XX XX XX XX</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Newsletter</h4>
                    <p class="text-gray-300 mb-4">Inscrivez-vous pour recevoir nos actualités et offres spéciales.</p>
                    <div class="flex">
                        <input type="email" placeholder="Votre email" class="px-4 py-2 rounded-l-lg flex-grow text-gray-800">
                        <button class="bg-accent px-4 py-2 rounded-r-lg font-semibold hover:bg-yellow-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Zoo Virtuel ASSAD - Coupe d'Afrique des Nations 2025. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Modal connexion -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-primary">Connexion</h3>
                <button id="close-login-modal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <form id="login-form">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-accent" required>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Mot de passe</label>
                    <input type="password" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-accent" required>
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember-me" class="mr-2">
                        <label for="remember-me" class="text-gray-700">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="text-accent hover:underline">Mot de passe oublié ?</a>
                </div>
                
                <button type="submit" class="btn-primary w-full py-3 font-semibold mb-4">Se connecter</button>
                
                <div class="text-center">
                    <p class="text-gray-700">Vous n'avez pas de compte ? <a href="#" class="text-accent font-semibold hover:underline">S'inscrire</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menu utilisateur
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        
        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });
        
        // Menu mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Carrousel
        const carousel = document.getElementById('carousel');
        const carouselSlides = document.querySelectorAll('.carousel-slide');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const dots = document.querySelectorAll('.carousel-dot');
        
        let currentSlide = 0;
        
        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('bg-accent');
                    dot.classList.remove('bg-white');
                } else {
                    dot.classList.remove('bg-accent');
                    dot.classList.add('bg-white');
                }
            });
        }
        
        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + carouselSlides.length) % carouselSlides.length;
            updateCarousel();
        });
        
        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % carouselSlides.length;
            updateCarousel();
        });
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
            });
        });
        
        // Auto-play carousel
        setInterval(() => {
            currentSlide = (currentSlide + 1) % carouselSlides.length;
            updateCarousel();
        }, 5000);
        
        // Modal de connexion
        const loginModal = document.getElementById('login-modal');
        const closeLoginModal = document.getElementById('close-login-modal');
        const loginForm = document.getElementById('login-form');
        
        // Simuler l'ouverture de la modal au clic sur le bouton de connexion
        userMenuButton.addEventListener('click', (e) => {
            if (e.target.closest('button') && !userMenu.contains(e.target)) {
                // Ouvrir la modal (pour la démo, on simule juste l'ouverture)
                // loginModal.classList.remove('hidden');
            }
        });
        
        closeLoginModal.addEventListener('click', () => {
            loginModal.classList.add('hidden');
        });
        
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Logique de connexion
            loginModal.classList.add('hidden');
            alert('Connexion réussie !');
        });
        
        // Fermer la modal en cliquant à l'extérieur
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
            
            // Fermer le menu utilisateur en cliquant à l'extérieur
            if (!userMenuButton.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
        
        // Animation au défilement
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observer les éléments avec la classe slide-up
        document.querySelectorAll('.slide-up').forEach(el => {
            observer.observe(el);
        });
        
        // Navigation fluide
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Fermer le menu mobile si ouvert
                    mobileMenu.classList.add('hidden');
                }
            });
        });
        
        // Simulation de réservation
        document.querySelectorAll('.btn-accent').forEach(button => {
            if (button.textContent.includes('Réserver')) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Dans une vraie application, on redirigerait vers une page de réservation
                    // Ici on simule juste une alerte
                    alert('Redirection vers la page de réservation...\n\nDans une implémentation réelle, vous seriez redirigé vers un formulaire de réservation sécurisé.');
                });
            }
        });
    </script>
</body>
</html>