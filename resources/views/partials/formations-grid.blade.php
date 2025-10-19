<!-- Grille des formations -->
<div class="formations-grid" style="
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
">

    @forelse($formations as $formation)
    <!-- Formation Card -->
    <div class="formation-card" data-category="{{ $formation->category ? $formation->category->slug : 'general' }}" style="
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        position: relative;
    ">
        <!-- Badge populaire -->
        @if($formation->populaire)
        <div style="position: absolute; top: 1rem; right: 1rem; background: #ff6b6b; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; z-index: 2;">
            <i class="fas fa-fire"></i> Populaire
        </div>
        @endif

        <!-- Image de la formation -->
        <div style="height: 200px; background: {{ $formation->category ? 'linear-gradient(135deg, ' . $formation->category->color . ' 0%, ' . $formation->category->color . 'cc 100%)' : 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' }}; position: relative; overflow: hidden;">
            @if($formation->image)
                <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}" style="width: 100%; height: 100%; object-fit: cover;">
            @else
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                    <i class="fas {{ $formation->category ? $formation->category->icon : 'fa-graduation-cap' }}" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.9;"></i>
                    <h4 style="margin: 0; font-size: 1.2rem; font-weight: 600;">{{ strtoupper($formation->category ? $formation->category->nom : 'FORMATION') }}</h4>
                </div>
            @endif
        </div>

        <!-- Contenu de la formation -->
        <div style="padding: 2rem;">
            <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.4rem; font-weight: 700;">
                {{ $formation->titre }}
            </h3>

            <p style="color: var(--text-dark); margin-bottom: 1.5rem; line-height: 1.6;">
                {{ Str::limit($formation->description, 120) }}
            </p>

            <!-- Détails de la formation -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-clock" style="color: var(--primary-blue);"></i>
                    <span style="font-size: 0.9rem; color: var(--text-dark);">{{ $formation->duree }}h de formation</span>
                </div>
                @if($formation->nombre_lecons)
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-play-circle" style="color: var(--primary-blue);"></i>
                    <span style="font-size: 0.9rem; color: var(--text-dark);">{{ $formation->nombre_lecons }} leçons</span>
                </div>
                @endif
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-certificate" style="color: var(--primary-blue);"></i>
                    <span style="font-size: 0.9rem; color: var(--text-dark);">Certification</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-infinity" style="color: var(--primary-blue);"></i>
                    <span style="font-size: 0.9rem; color: var(--text-dark);">Accès à vie</span>
                </div>
            </div>

            <!-- Niveau et évaluation -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <div>
                    <span style="background: #e3f2fd; color: var(--primary-blue); padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">{{ ucfirst($formation->niveau) }}</span>
                </div>
                @if($formation->note > 0)
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="color: #FFD700;">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($formation->note))
                                <i class="fas fa-star"></i>
                            @elseif($i - 0.5 <= $formation->note)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span style="font-size: 0.9rem; color: var(--text-dark);">({{ number_format($formation->note, 1) }}/5)</span>
                </div>
                @endif
            </div>

            <!-- Prix et CTA -->
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span style="font-size: 1.8rem; font-weight: 700; color: var(--primary-blue);">{{ number_format($formation->prix, 0, ',', ' ') }} FCFA</span>
                </div>
                <button class="inscrire-btn" data-formation-id="{{ $formation->id }}" data-formation-titre="{{ $formation->titre }}" style="
                    background: var(--primary-blue);
                    color: white;
                    border: none;
                    padding: 0.75rem 1.5rem;
                    border-radius: 10px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(30, 90, 168, 0.3)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <i class="fas fa-user-plus"></i> S'inscrire
                </button>
            </div>
        </div>
    </div>
    @empty
    <!-- Message si aucune formation -->
    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
        <i class="fas fa-graduation-cap" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
        <h3 style="color: var(--text-dark); margin-bottom: 1rem;">Aucune formation disponible</h3>
        <p style="color: var(--text-medium);">Les formations seront bientôt disponibles. Revenez plus tard !</p>
    </div>
    @endforelse
</div>
