<?php
session_start();
include('../include/include.php');
$sqlentry = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser'] . " AND isAdmin = 'admin'");
if (mysqli_num_rows($sqlentry) == 0) {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tables - Anime Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="./assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="../index.php">
          Anime
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">

            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="index.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Forms</span>
            </a>
          </li>

          <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.html">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
              </svg>
              <span class="ml-4">Tables</span>
            </a>
          </li>

        </ul>

      </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="../index.php">
          Anime
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">

            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="index.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.php">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Forms</span>
            </a>
          </li>


          <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.html">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
              </svg>
              <span class="ml-4">Tables</span>
            </a>
          </li>
        </ul>

      </div>
    </aside>
    <div class="flex flex-col flex-1 w-full">
      <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-red-600 dark:text-red-300">
          <!-- Mobile hamburger -->
          <button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-red" @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
          </button>

        </div>
      </header>
      <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tabela usuários
          </h2>
          <!-- CTA -->

          <!-- With actions -->

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM users");

                  while ($row = mysqli_fetch_assoc($sql)) {
                    echo "
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <!-- Avatar with inset shadow -->
                          <div
                            class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
                          >
                            <img
                              class='object-cover w-full h-full rounded-full'
                              src='../images-user/" . $row['img'] . "'
                              alt=''
                              loading='lazy'
                            />
                            <div
                              class='absolute inset-0 rounded-full shadow-inner'
                              aria-hidden='true'
                            ></div>
                          </div>
                          <div>
                            <p class='font-semibold'>" . $row['username'] . "</p>
                            <p class='text-xs text-gray-600 dark:text-gray-400'>
                            " . $row['isAdmin'] . "
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['email'] . "
                      </td>
                      <td class='px-4 py-3 text-xs'>
                        <span
                          class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'
                        >
                        Conta " . $row['status'] . "
                        </span>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['datac'] . "
                      </td>
                      <td class='px-4 py-3'>
                        <div class='flex items-center space-x-4 text-sm'>
                        <a href='edit-user.php?id=" . $row['idUser'] . "'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Edit'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'
                              ></path>
                            </svg>
                          </button>
                          </a>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Delete'
                          >
                          <a href='action/remove.php?id=" . $row['idUser'] . "&oq=user'>
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                fill-rule='evenodd'
                                d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                clip-rule='evenodd'
                              ></path>
                            </svg>
                            </a>
                          </button>
                        </div>
                      </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

              <span class="col-span-2"></span>

            </div>
          </div>
        </div>
        <div class="container grid px-6 mx-auto">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tabela Animes
          </h2>
          <!-- CTA -->

          <!-- With actions -->

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Visualização</th>
                    <th class="px-4 py-3">Comentarios</th>
                    <th class="px-4 py-3">Descricao</th>
                    <th class="px-4 py-3">idCategoria</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM anime");

                  while ($row = mysqli_fetch_assoc($sql)) {
                    $result = $row['descricao'];
                    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
                    echo "
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <!-- Avatar with inset shadow -->
                          <div
                            class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
                          >
                            <img
                              class='object-cover w-full h-full rounded-full'
                              src='../images-user/" . $row['img'] . "'
                              alt=''
                              loading='lazy'
                            />
                            <div
                              class='absolute inset-0 rounded-full shadow-inner'
                              aria-hidden='true'
                            ></div>
                          </div>
                          <div>
                            <a href='../anime-details/anime-details.php?id=" . $row['idAnime'] . "'><p class='font-semibold'>" . $row['nome'] . "</p></a>
                          </div>
                        </div>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['visualizacao'] . "
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['comentarios'] . "
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $msg . "
                      </td>
                      <td class='px-4 py-3 text-xs'>
                        <span
                          class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'
                        >
                        " . $row['FK_idCategoria'] . "
                        </span>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['datac'] . "
                      </td>
                      <td class='px-4 py-3'>
                        <div class='flex items-center space-x-4 text-sm'>
                        <a href='edit-anime.php?id=" . $row['idAnime'] . "'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Edit'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'
                              ></path>
                            </svg>
                          </button>
                          </a>
                          <a href='action/remove.php?id=" . $row['idAnime'] . "&oq=anime'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Delete'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                fill-rule='evenodd'
                                d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                clip-rule='evenodd'
                              ></path>
                            </svg>
                          </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

              <span class="col-span-2"></span>

            </div>
          </div>


        </div>
        <div class="container grid px-6 mx-auto">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tabela Episodios
          </h2>
          <!-- CTA -->

          <!-- With actions -->

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">idEpisodio</th>
                    <th class="px-4 py-3">FK_idAnime</th>
                    <th class="px-4 py-3">FK_idTemporada</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM episodio");

                  while ($row = mysqli_fetch_assoc($sql)) {

                    echo "
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <!-- Avatar with inset shadow -->
                          <div
                            class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
                          >
                            <img
                              class='object-cover w-full h-full rounded-full'
                              src='../img/logo.png'
                              alt=''
                              loading='lazy'
                            />
                            <div
                              class='absolute inset-0 rounded-full shadow-inner'
                              aria-hidden='true'
                            ></div>
                          </div>
                          <div>
                            <a href=''><p class='font-semibold'>" . $row['nome'] . "</p></a>
                          </div>
                        </div>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['idEpisodio'] . "
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['FK_idAnime'] . "
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['FK_idTemporada'] . "
                      </td>
                      <td class='px-4 py-3 text-xs'>
                        <span
                          class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'
                        >
                        " . $row['datac'] . "
                        </span>
                      </td>

                      <td class='px-4 py-3'>
                        <div class='flex items-center space-x-4 text-sm'>
                        <a href='edit-episodio.php?id=" . $row['idEpisodio'] . "'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Edit'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'
                              ></path>
                            </svg>
                          </button>
                          </a>
                          <a href='action/remove.php?id=" . $row['idEpisodio'] . "&oq=episodio'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Delete'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                fill-rule='evenodd'
                                d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                clip-rule='evenodd'
                              ></path>
                            </svg>
                          </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

              <span class="col-span-2"></span>

            </div>
          </div>


        </div>
        <div class="container grid px-6 mx-auto">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tabela Categoria
          </h2>
          <!-- CTA -->

          <!-- With actions -->

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM categoria");

                  while ($row = mysqli_fetch_assoc($sql)) {
                    echo "
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <!-- Avatar with inset shadow -->
                          <div
                            class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
                          >
                            <img
                              class='object-cover w-full h-full rounded-full'
                              src='../images-user/" . $row['img'] . "'
                              alt=''
                              loading='lazy'
                            />
                            <div
                              class='absolute inset-0 rounded-full shadow-inner'
                              aria-hidden='true'
                            ></div>
                          </div>
                          <div>
                            <p class='font-semibold'>" . $row['nome'] . "</p>
                          </div>
                        </div>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['datac'] . "
                      </td>
                      <td class='px-4 py-3'>
                        <div class='flex items-center space-x-4 text-sm'>
                        <a href='edit-categoria.php?id=" . $row['idCategoria'] . "'>
                        <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Edit'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'
                              ></path>
                            </svg>
                          </button>
                          <a href='action/remove.php?id=" . $row['idCategoria'] . "&oq=categoria'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Delete'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                fill-rule='evenodd'
                                d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                clip-rule='evenodd'
                              ></path>
                            </svg>
                          </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

              <span class="col-span-2"></span>

            </div>
          </div>


        </div>

        <div class="container grid px-6 mx-auto">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tabela Temporada
          </h2>
          <!-- CTA -->

          <!-- With actions -->

          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">idTemporada</th>
                    <th class="px-4 py-3">date</th>
                    <th class="px-4 py-3">Actions</th>

                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM temporada");

                  while ($row = mysqli_fetch_assoc($sql)) {
                    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
                    echo "
                    <tr class='text-gray-700 dark:text-gray-400'>
                      <td class='px-4 py-3'>
                        <div class='flex items-center text-sm'>
                          <!-- Avatar with inset shadow -->
                          <div
                            class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
                          >
                          <img
                          class='object-cover w-full h-full rounded-full'
                          src='../img/logo.png'
                          alt=''
                          loading='lazy'
                        />
                        <div
                          class='absolute inset-0 rounded-full shadow-inner'
                          aria-hidden='true'
                        ></div>
                      </div>
                      <div>
                        <a href=''><p class='font-semibold'>" . $row['nome'] . "</p></a>
                      </div>
                        </div>
                      </td>

                      <td class='px-4 py-3 text-xs'>
                        <span
                          class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'
                        >
                        " . $row['idTemporada'] . "
                        </span>
                      </td>
                      <td class='px-4 py-3 text-sm'>
                      " . $row['datac'] . "
                      </td>
                      <td class='px-4 py-3'>
                        <div class='flex items-center space-x-4 text-sm'>
                        <a href='edit-temporada.php?id=" . $row['idTemporada'] . "'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Edit'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                d='M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z'
                              ></path>
                            </svg>
                          </button>
                          </a>
                          <a href='action/remove.php?id=" . $row['idTemporada'] . "&oq=temporada'>
                          <button
                            class='flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray'
                            aria-label='Delete'
                          >
                            <svg
                              class='w-5 h-5'
                              aria-hidden='true'
                              fill='currentColor'
                              viewBox='0 0 20 20'
                            >
                              <path
                                fill-rule='evenodd'
                                d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                clip-rule='evenodd'
                              ></path>
                            </svg>
                          </button>
                          </a>
                        </div>
                      </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

              <span class="col-span-2"></span>

            </div>
          </div>


        </div>

      </main>
    </div>
  </div>
</body>

</html>