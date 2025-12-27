<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - Zoo ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a365d',
                        accent: '#d69e2e',
                        success: '#38a169',
                        danger: '#e53e3e',
                    },
                    fontFamily: { 'sans': ['Poppins', 'sans-serif'] },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-primary shadow-lg">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <div class="bg-accent p-2 rounded-lg">
                    <i class="fas fa-paw text-white text-2xl"></i>
                </div>
                <a href="#" class="text-white text-2xl font-bold uppercase tracking-wider">ASSAD</a>
            </div>
            
            <div class="hidden md:flex space-x-8 text-white">
                <a href="#" class="hover:text-accent transition">Réserver une visite</a>
                <a href="#" class="hover:text-accent transition">Les Animaux</a>
                <a href="#" class="text-danger font-semibold"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-12">
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-primary mb-2">Bonjour, Visiteur ! 👋</h1>
                <p class="text-gray-600">Bienvenue dans votre espace personnel dédié à la CAN 2025.</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-accent flex items-center space-x-4">
                <div class="text-3xl font-bold text-primary">3</div>
                <div class="text-sm text-gray-500 uppercase font-semibold">Réservations<br>Actives</div>
            </div>
        </div>

        <section class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-primary px-8 py-5 flex justify-between items-center">
                <h2 class="text-xl font-bold text-white"><i class="fas fa-calendar-check mr-3 text-accent"></i>Mes prochaines visites</h2>
                <a href="#" class="text-sm bg-accent text-white px-4 py-2 rounded-lg font-semibold hover:bg-yellow-600 transition">
                    + Réserver une visite
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-400 text-xs uppercase tracking-widest">
                            <th class="px-8 py-4 font-semibold">Détails de la visite</th>
                            <th class="px-8 py-4 font-semibold">Date & Heure</th>
                            <th class="px-8 py-4 font-semibold text-center">Places</th>
                            <th class="px-8 py-4 font-semibold text-center">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50/50 transition group">
                            <td class="px-8 py-6">
                                <div class="font-bold text-primary text-lg group-hover:text-accent transition">Sur les traces du Lion de l'Atlas</div>
                                <div class="text-xs text-gray-400 flex items-center mt-1">
                                    <i class="fas fa-info-circle mr-1"></i> ID Réservation: #RES-0124
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-3 text-gray-700 font-medium">
                                    <i class="far fa-calendar text-accent"></i>
                                    <span>15/05/2025</span>
                                    <span class="text-gray-300">|</span>
                                    <i class="far fa-clock text-accent"></i>
                                    <span>14:30</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-block bg-gray-100 px-4 py-1 rounded-full text-primary font-bold text-sm">
                                    2 pers.
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="bg-green-100 text-success px-3 py-1 rounded text-xs font-bold uppercase tracking-tighter border border-green-200">Confirmée</span>
                            </td>
                        </tr>

                        <tr class="hover:bg-blue-50/50 transition group">
                            <td class="px-8 py-6">
                                <div class="font-bold text-primary text-lg group-hover:text-accent transition">Safari Nocturne : Savane Africaine</div>
                                <div class="text-xs text-gray-400 flex items-center mt-1">
                                    <i class="fas fa-info-circle mr-1"></i> ID Réservation: #RES-0158
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-3 text-gray-700 font-medium">
                                    <i class="far fa-calendar text-accent"></i>
                                    <span>22/05/2025</span>
                                    <span class="text-gray-300">|</span>
                                    <i class="far fa-clock text-accent"></i>
                                    <span>20:00</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-block bg-gray-100 px-4 py-1 rounded-full text-primary font-bold text-sm">
                                    4 pers.
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="bg-red-100 text-danger px-3 py-1 rounded text-xs font-bold uppercase tracking-tighter border border-red-200">Annulée</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <div class="mt-12 bg-gradient-to-r from-primary to-blue-900 rounded-2xl p-8 text-white flex flex-col md:flex-row items-center justify-between shadow-2xl">
            <div class="flex items-center space-x-6">
                <div class="w-20 h-20 rounded-full border-2 border-accent p-1 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?auto=format&fit=crop&w=200" class="w-full h-full object-cover rounded-full" alt="Asaad">
                </div>
                <div>
                    <h3 class="text-xl font-bold text-accent">Vivez l'expérience "Lion de l'Atlas"</h3>
                    <p class="text-blue-100 text-sm">Visites exclusives disponibles pendant toute la durée de la CAN 2025 au Maroc.</p>
                </div>
            </div>
            <button class="mt-6 md:mt-0 bg-accent hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-xl transition-all hover:scale-105 active:scale-95 shadow-lg">
                Explorer l'Histoire
            </button>
        </div>
    </main>

    <footer class="mt-20 py-10 bg-gray-900 text-gray-500 text-center text-sm">
        <p>&copy; 2025 Zoo Virtuel ASSAD - Spécial Coupe d'Afrique des Nations Maroc</p>
    </footer>

</body>
</html>