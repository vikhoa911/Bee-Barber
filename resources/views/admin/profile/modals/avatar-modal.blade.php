<div x-show="isProfileAvatarModal" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isProfileAvatarModal = false"
        class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
        <!-- close btn -->
        <button @click="isProfileAvatarModal = false"
            class="transition-color absolute right-5 top-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                    fill="" />
            </svg>
        </button>
        <div class="px-2 pr-14">
            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                Edit Avatar
            </h4>
            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
                Update your avatar to keep your profile beautiful.
            </p>
        </div>
        <form method="POST" action="{{ route('admin.profile.avatarUpdate') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        File Input
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <!-- Elements -->
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Upload file
                        </label>
                        <input type="file" name="avatar" id="avatarInput"
                            class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400" />
                        <div class="mt-4">
                            <img id="cropperImage" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : '' }}"
                                alt="" class="w-32 h-32 object-cover rounded-full border"
                                style="{{ $user->avatar ? '' : 'display:none;' }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end relative z-20">
                <button @click="isProfileAvatarModal = false" type="button"
                    class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                    Close
                </button>
                <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 sm:w-auto z-10">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarInput = document.getElementById('avatarInput');
        const cropperImage = document.getElementById('cropperImage');
        const form = cropperImage.closest('form');
        let cropper;

        if (cropperImage.src) {
            cropper = new Cropper(cropperImage, {
                aspectRatio: 1,
                viewMode: 1,
                autoCropArea: 1,
            });
            cropperImage.style.display = 'block';
        }

        avatarInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    cropperImage.src = e.target.result;
                    cropperImage.style.display = 'block';

                    if (cropper) cropper.destroy();
                    cropper = new Cropper(cropperImage, {
                        aspectRatio: 1,
                        viewMode: 1,
                        autoCropArea: 1,
                    });
                }
                reader.readAsDataURL(file);
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (!cropper) return;

            cropper.getCroppedCanvas({
                width: 256,
                height: 256
            }).toBlob(function(blob) {
                const formData = new FormData(form);
                formData.set('avatar', blob, 'avatar.png');

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    }).then(res => location.reload())
                    .catch(err => console.error(err));
            });
        });
    });
</script>
<style>
    .cropper-view-box,
    .cropper-face {
        border-radius: 50% !important;
    }
</style>
