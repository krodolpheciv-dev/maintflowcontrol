@extends('auth.layouts.auth')

@section('title', 'Sélection du projet')
@section('logo-text', 'GestIOT')
@section('logo-subtitle', 'Choisissez votre espace de travail')

@section('content')
    <div class="auth-title">Sélectionnez votre projet</div>
    <div class="auth-subtitle">Vous êtes affecté à un ou plusieurs projets. Choisissez celui sur lequel vous souhaitez travailler.</div>

    <!-- Information utilisateur -->
    <div style="background: #f8fafc; padding: 14px 18px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 14px; border: 1px solid #e2e8f0;">
        <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #2b6cb0 0%, #1a4f8b 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 18px; flex-shrink: 0;">
            {{ strtoupper(substr(Auth::user()->prenom ?? 'U', 0, 1)) }}{{ strtoupper(substr(Auth::user()->nom ?? '', 0, 1)) }}
        </div>
        <div style="flex: 1;">
            <div style="font-weight: 600; font-size: 15px; color: #1a2a3a;">{{ Auth::user()->prenom ?? '' }} {{ Auth::user()->nom ?? '' }}</div>
            <div style="font-size: 13px; color: #7a8494;">{{ Auth::user()->email ?? '' }}</div>
        </div>
        <div>
            <span style="background: #e2e8f0; padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 500; color: #4a5a6a;">
                <i class="fas fa-folder-open me-1"></i>&nbsp;{{ $projets->count() }} projet(s)
            </span>
        </div>
    </div>

    <form method="POST" action="{{ route('select.project.submit') }}" id="projectForm">
        @csrf

        <div class="form-group">
            <label for="project_id">Choisissez un projet <span class="required">*</span></label>
            <div class="input-wrapper">
                <i class="fas fa-project-diagram input-icon"></i>
                <select name="project_id" id="project_id" class="form-select" required style="width: 100%; padding: 12px 14px 12px 44px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: 14px; font-family: 'Inter', sans-serif; color: #1a2a3a; background: #fafbfc; appearance: none; cursor: pointer; transition: all 0.2s;">
                    <option value="" disabled selected>Sélectionnez un projet</option>
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->id }}">
                            {{ $projet->nom_projet }}
                            @php
                                $role = $projet->pivot->role_id ? \Spatie\Permission\Models\Role::find($projet->pivot->role_id) : null;
                            @endphp
                            @if($role)
                                ({{ $role->name }})
                            @endif
                        </option>
                    @endforeach
                </select>
                <div style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #a0b0c0;">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            @error('project_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Affichage du rôle du projet sélectionné -->
        <div id="selectedProjectInfo" style="display: none; background: #e8f0fe; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #2b6cb0;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-info-circle" style="color: #2b6cb0;"></i>
                <span style="font-size: 14px; color: #1a2a3a;">
                    <strong>Projet sélectionné :</strong> <span id="selectedProjectName"></span>                   
                    <span id="selectedProjectRole"></span>
                </span>
            </div>
        </div>

        <!-- Bouton -->
        <button type="submit" class="btn-primary" id="submitBtn" disabled>
            <span id="btnText">
                <i class="fas fa-arrow-right me-2"></i>&nbsp;&nbsp;Continuer vers le projet
            </span>
            <span id="btnSpinner" style="display: none;">
                <i class="fas fa-spinner fa-spin me-2"></i>&nbsp;&nbsp;Chargement...
            </span>
        </button>
    </form>

    <div class="auth-links">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-size: 14px; font-weight: 500; transition: all 0.2s; font-family: 'Inter', sans-serif;">
                <i class="fas fa-sign-out-alt me-1"></i>&nbsp;&nbsp;Se déconnecter
            </button>
        </form>
    </div>

    @push('styles')
    <style></style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('project_id');
            const submitBtn = document.getElementById('submitBtn');
            const projectInfo = document.getElementById('selectedProjectInfo');
            const projectName = document.getElementById('selectedProjectName');
            const projectRole = document.getElementById('selectedProjectRole');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const projectForm = document.getElementById('projectForm');

            // Récupérer les données des projets
            const projects = @json($projets->map(function($projet) {
                $role = $projet->pivot->role_id ? \Spatie\Permission\Models\Role::find($projet->pivot->role_id) : null;
                return [
                    'id' => $projet->id,
                    'nom' => $projet->nom_projet,
                    'role' => $role ? ' (' . $role->name . ')' : ''
                ];
            }));

            // Événement de changement du select
            select.addEventListener('change', function() {
                const selectedId = parseInt(this.value);
                const selectedProject = projects.find(p => p.id === selectedId);

                if (selectedProject) {
                    // Activer le bouton
                    submitBtn.disabled = false;
                    
                    // Afficher les informations du projet
                    projectName.textContent = selectedProject.nom;
                    projectRole.textContent = selectedProject.role;
                    projectInfo.style.display = 'block';
                    
                    // Animation
                    projectInfo.style.animation = 'none';
                    setTimeout(() => {
                        projectInfo.style.animation = 'fadeInUp 0.3s ease';
                    }, 10);
                } else {
                    submitBtn.disabled = true;
                    projectInfo.style.display = 'none';
                }
            });

            // Si un projet est déjà sélectionné (après erreur de validation)
            if (select.value) {
                const event = new Event('change');
                select.dispatchEvent(event);
            }

            // Gestion du spinner dans le bouton 
            projectForm.addEventListener('submit', function() {
                // Cacher le texte, afficher le spinner
                btnText.style.display = 'none';
                btnSpinner.style.display = 'inline';
                
                // Désactiver le bouton
                submitBtn.disabled = true;
            });

            // Si erreur de validation, on remet le bouton normal 
            @if($errors->any())
                btnText.style.display = 'inline';
                btnSpinner.style.display = 'none';
                submitBtn.disabled = false;
                
                // Réactiver le bouton si un projet est sélectionné
                if (select.value) {
                    submitBtn.disabled = false;
                }
            @endif
        });
    </script>
    @endpush
@endsection