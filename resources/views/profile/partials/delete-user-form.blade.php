<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-dark">
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger"
            data-bs-toggle="modal" data-bs-target="#confirm-user-deletion-modal">
        {{ __('Supprimer le compte') }}
    </button>

    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h2 class="modal-title text-lg font-medium" id="confirmUserDeletionModalLabel">
                            {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Mot de passe') }}" required>
                        </div>

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('Annuler') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Supprimer le compte') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
