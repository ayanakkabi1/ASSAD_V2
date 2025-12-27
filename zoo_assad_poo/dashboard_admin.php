<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Zoo ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0f172a',    /* Slate 900 */
                        accent: '#d4af37',     /* Gold */
                        sidebar: '#1e293b',   /* Slate 800 */
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 flex min-h-screen">

    <aside class="w-72 bg-primary text-slate-300 shadow-2xl flex flex-col">
        <div class="p-8 flex items-center space-x-3 border-b border-slate-800">
            <div class="bg-accent p-2 rounded-lg shadow-lg">
                <i class="fas fa-paw text-primary text-xl"></i>
            </div>
            <span class="text-xl font-bold text-white tracking-tight">ASSAD <span class="text-accent italic">ZOO</span></span>
        </div>
        
        <nav class="flex-1 px-4 mt-8 space-y-2">
            <a href="#" class="flex items-center space-x-4 py-3 px-4 bg-accent text-primary font-bold rounded-xl shadow-md transition-all">
                <i class="fas fa-th-large text-lg"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="#" class="flex items-center space-x-4 py-3 px-4 hover:bg-slate-800 hover:text-white rounded-xl transition-all group">
                <i class="fas fa-hippo text-accent group-hover:scale-110 transition-transform"></i>
                <span>Gestion Animaux</span>
            </a>
            <a href="#" class="flex items-center space-x-4 py-3 px-4 hover:bg-slate-800 hover:text-white rounded-xl transition-all group">
                <i class="fas fa-leaf text-accent group-hover:scale-110 transition-transform"></i>
                <span>Gestion Habitats</span>
            </a>
            <a href="#" class="flex items-center space-x-4 py-3 px-4 hover:bg-slate-800 hover:text-white rounded-xl transition-all group">
                <i class="fas fa-users-cog text-accent group-hover:scale-110 transition-transform"></i>
                <span>Utilisateurs</span>
            </a>
        </nav>

        <div class="p-6 border-t border-slate-800">
            <a href="#" class="flex items-center space-x-3 py-3 px-4 text-red-400 hover:bg-red-500/10 rounded-xl transition-all font-medium">
                <i class="fas fa-power-off"></i>
                <span>Déconnexion</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        
        <header class="h-24 bg-white border-b border-slate-200 flex items-center justify-between px-10">
            <div>
                <h1 class="text-2xl font-black text-primary uppercase tracking-tight">Console de Contrôle</h1>
                <p class="text-sm text-slate-400">Gestion centrale du Zoo - CAN 2025</p>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="text-right">
                    <p class="text-sm font-bold text-primary">Super Admin</p>
                    <p class="text-xs text-green-500 font-semibold uppercase tracking-widest">En ligne</p>
                </div>
                <div class="relative group cursor-pointer">
                    <div class="w-12 h-12 bg-slate-200 rounded-2xl flex items-center justify-center border-2 border-accent/30 group-hover:border-accent transition-all">
                        <i class="fas fa-user-shield text-primary"></i>
                    </div>
                </div>
            </div>
        </header>

        <main class="p-10">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Population Animale</p>
                        <h3 class="text-4xl font-black text-primary tracking-tighter">86</h3>
                    </div>
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 text-2xl">
                        <i class="fas fa-cat"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Zones & Habitats</p>
                        <h3 class="text-4xl font-black text-primary tracking-tighter">12</h3>
                    </div>
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl">
                        <i class="fas fa-mountain-sun"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-1">Approbations en attente</p>
                        <h3 class="text-4xl font-black text-orange-500 tracking-tighter">03</h3>
                    </div>
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600 text-2xl animate-pulse">
                        <i class="fas fa-id-badge"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[2.5rem] shadow-xl shadow-slate-200/50">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-xl font-black text-primary">Actions Prioritaires</h2>
                    <span class="px-4 py-1 bg-slate-100 text-slate-500 rounded-full text-xs font-bold uppercase">Accès Rapide</span>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="#" class="group relative overflow-hidden bg-slate-50 p-6 rounded-2xl hover:bg-primary transition-all duration-300">
                        <div class="relative z-10">
                            <i class="fas fa-plus-square text-2xl text-accent mb-4 block"></i>
                            <span class="font-bold text-primary group-hover:text-white">Nouvel Animal</span>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-6xl text-slate-200/50 group-hover:text-white/5 transition-colors">
                            <i class="fas fa-hippo"></i>
                        </div>
                    </a>

                    <a href="#" class="group relative overflow-hidden bg-slate-50 p-6 rounded-2xl hover:bg-primary transition-all duration-300">
                        <div class="relative z-10">
                            <i class="fas fa-map-marked-alt text-2xl text-accent mb-4 block"></i>
                            <span class="font-bold text-primary group-hover:text-white">Zone Habitat</span>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-6xl text-slate-200/50 group-hover:text-white/5 transition-colors">
                            <i class="fas fa-tree"></i>
                        </div>
                    </a>

                    <a href="#" class="group relative overflow-hidden bg-slate-50 p-6 rounded-2xl hover:bg-primary transition-all duration-300 border-2 border-orange-100 hover:border-transparent">
                        <div class="relative z-10">
                            <i class="fas fa-user-check text-2xl text-orange-500 mb-4 block"></i>
                            <span class="font-bold text-primary group-hover:text-white">Vérifier Guides</span>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-6xl text-slate-200/50 group-hover:text-white/5 transition-colors">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </a>

                    <a href="#" class="group relative overflow-hidden bg-slate-50 p-6 rounded-2xl hover:bg-primary transition-all duration-300">
                        <div class="relative z-10">
                            <i class="fas fa-analytics text-2xl text-accent mb-4 block"></i>
                            <span class="font-bold text-primary group-hover:text-white">Rapport Stats</span>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-6xl text-slate-200/50 group-hover:text-white/5 transition-colors">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>

</body>
</html>