<div class="relative w-full mx-auto">
  <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-auto max-w-full px-3">
        <div class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
          <label for="profileImageInput">
            <?php if (!empty($security['foto_profile'])): ?>
              <img src="<?= BASE_URL; ?>assets/images/blank-profile-picture.png" alt="profile_image" class="w-full h-full object-cover shadow-2xl rounded-xl cursor-pointer" />
            <?php else: ?>
              <img src="getFotoProfile?id=<?= $_SESSION['id_security'] ?>" class="w-full h-full object-cover shadow-2xl rounded-xl cursor-pointer" alt="foto-profile" />
            <?php endif; ?>
          </label>
          <input type="file" id="profileImageInput" class="hidden" onchange="previewImage(event)">
        </div>
      </div>
      <div class="flex-none w-auto max-w-full px-3 my-auto">
        <div class="h-full">
          <h5 class="mb-1 dark:text-white"><?= $_SESSION['nama_security'] ?></h5>
          <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">
            <?= $_SESSION['user_role'] ?>
          </p>
        </div>
      </div>
      <div class="flex-auto flex justify-end px-3 py-3">
        <button type="button" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
          <span class="mr-2"><i class="fa-solid fa-lock" style="color: #ffffff;"></i></span>
          Ganti Password
        </button>
      </div>
    </div>
  </div>
</div>

<div class="w-full p-6 mx-auto">
  <div class="w-11 max-w-full px-3 shrink-0 md:flex-0">
    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
        <div class="flex items-center">
          <p class="mb-0 dark:text-white/80">Edit Profile</p>
          <button type="button" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Simpan</button>
        </div>
      </div>
      <div class="flex-auto p-6">
        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">User Information</p>
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama</label>
              <input type="text" name="username" value="<?= $data_security['nama_security'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
              <input type="email" name="email" value="<?= $data_security['username'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
          <div class="w-full max-w-full px-3">
            <div class="mb-4">
              <label for="first name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No HP</label>
              <input type="text" name="first name" value="<?= $data_security['noHp_security'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
        </div>
        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
      </div>
    </div>
  </div>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
      const imgElement = document.querySelector('label[for="profileImageInput"] img');
      imgElement.src = reader.result;
    };
    reader.readAsDataURL(input.files[0]);
  }

  document.querySelector('label[for="profileImageInput"]').addEventListener('click', function() {
    document.getElementById('profileImageInput').click();
  });
</script>




<div class="relative w-full mx-auto">
  <div
    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-auto max-w-full px-3">
        <div
          class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
          <label for="profileImageInput" class="cursor-pointer">
            <?php if (!empty($security['foto_profile'])): ?>
              <img src="<?= BASE_URL; ?>assets/images/blank-profile-picture.png" alt="profile_image"
                class="w-full h-full object-cover shadow-2xl rounded-xl cursor-pointer" />
            <?php else: ?>
              <img src="getFotoProfile?id=<?= $_SESSION['id_security'] ?>"
                class="w-full h-full object-cover shadow-2xl rounded-xl cursor-pointer" alt="foto-profile" />
              <form id="updateProfileImageForm" action="updateFotoProfile" method="POST"
                enctype="multipart/form-data">
                <label for="profileImageInput" class="edit-icon">
                  <i class="fa-solid fa-pen text-white"></i>
                </label>
                <input type="file" id="profileImageInput" name="profileImage" accept="image/*" style="display: none;"
                  onchange="document.getElementById('updateProfileImageForm').submit();">
              </form>
            <?php endif; ?>
            <div
              class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 rounded-xl">
              <i class="fa-solid fa-pen text-white"></i>
            </div>
          </label>
          <input type="file" id="profileImageInput" class="hidden" onchange="previewImage(event)">
        </div>
      </div>
      <div class="flex-none w-auto max-w-full px-3 my-auto">
        <div class="h-full">
          <h5 class="mb-1 dark:text-white"><?= $_SESSION['nama_security'] ?></h5>
          <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">
            <?= $_SESSION['user_role'] ?>
          </p>
        </div>
      </div>
      <div class="flex-auto flex justify-end px-3 py-3">
        <button type="button"
          class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
          <span class="mr-2"><i class="fa-solid fa-lock" style="color: #ffffff;"></i></span>
          Ganti Password
        </button>
      </div>
    </div>
  </div>
</div>

<form id="updateProfileImageForm" action="updateFotoProfile.php" method="post" enctype="multipart/form-data"
  class="hidden">
  <input type="file" id="profileImageInput" name="profileImage" onchange="previewImage(event)">
</form>

<div class="w-full p-6 mx-auto">
  <div class="w-11 max-w-full px-3 shrink-0 md:flex-0">
    <div
      class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
        <div class="flex items-center">
          <p class="mb-0 dark:text-white/80">Edit Profile</p>
          <button type="submit" form="updateProfileImageForm"
            class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Simpan</button>
        </div>
      </div>
      <div class="flex-auto p-6">
        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">User Information</p>
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="username"
                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama</label>
              <input type="text" name="username" value="<?= $data_security['nama_security'] ?>"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
          <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
            <div class="mb-4">
              <label for="email"
                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
              <input type="email" name="email" value="<?= $data_security['username'] ?>"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
          <div class="w-full max-w-full px-3">
            <div class="mb-4">
              <label for="first name"
                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No HP</label>
              <input type="text" name="first name" value="<?= $data_security['noHp_security'] ?>"
                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
            </div>
          </div>
        </div>
        <hr
          class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
      </div>
    </div>
  </div>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function () {
      const imgElement = document.querySelector('label[for="profileImageInput"] img');
      imgElement.src = reader.result;
    };
    reader.readAsDataURL(input.files[0]);
  }

  document.querySelector('label[for="profileImageInput"]').addEventListener('click', function () {
    document.getElementById('profileImageInput').click();
  });
</script>


<style>
  .profile-container {
    position: relative;
    display: inline-block;
  }

  .profile-image img {
    width: 150px;
    height: 150px;
  }

  .edit-icon {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 5px;
    cursor: pointer;
  }
</style>