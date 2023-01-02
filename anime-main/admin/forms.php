<?php
  session_start();
  include('../include/include.php');
  $sqlentry = mysqli_query($conn, "SELECT * FROM users WHERE idUser = ". $_SESSION['idUser']. " AND isAdmin = 'admin'");
  if(mysqli_num_rows($sqlentry) == 0){
   header("Location: ../index.php");
  }
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Anime Dashboard - Forms</title>
    <link rel="stylesheet" href="../css/style.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
  </head>
  <body>
    
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
       <!-- Desktop sidebar -->
       <aside
       class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
     >
       <div class="py-4 text-gray-500 dark:text-gray-400">
         <a
           class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
           href="../index.php"
         >
           Anime
         </a>
         <ul class="mt-6">
           <li class="relative px-6 py-3">

             <a
               class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
               href="index.php"
             >
               <svg
                 class="w-5 h-5"
                 aria-hidden="true"
                 fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
               >
                 <path
                   d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                 ></path>
               </svg>
               <span class="ml-4">Dashboard</span>
             </a>
           </li>
         </ul>
         <ul>
          
           <li class="relative px-6 py-3">
            <span
            class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"
          ></span>
             <a
               class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
               href="forms.php"
             >
               <svg
                 class="w-5 h-5"
                 aria-hidden="true"
                 fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
               >
                 <path
                   d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                 ></path>
               </svg>
               <span class="ml-4">Forms</span>
             </a>
           </li>
     
           <li class="relative px-6 py-3">
             <a
               class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
               href="tables.php"
             >
               <svg
                 class="w-5 h-5"
                 aria-hidden="true"
                 fill="none"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
               >
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
     <div
       x-show="isSideMenuOpen"
       x-transition:enter="transition ease-in-out duration-150"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in-out duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
     ></div>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
      class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
      x-show="isSideMenuOpen"
      x-transition:enter="transition ease-in-out duration-150"
      x-transition:enter-start="opacity-0 transform -translate-x-20"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in-out duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0 transform -translate-x-20"
      @click.away="closeSideMenu"
      @keydown.escape="closeSideMenu"
    >
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a
          class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
          href="../index.php"
        >
          Anime
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
           
            <a
              class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
              href="index.php"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                ></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            <span
            class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"
          ></span>
            <a
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="forms.php"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                ></path>
              </svg>
              <span class="ml-4">Forms</span>
            </a>
          </li>
        
      
          <li class="relative px-6 py-3">
            <a
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="tables.php"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
              </svg>
              <span class="ml-4">Tables</span>
            </a>
          </li>
        </ul>

      </div>
    </aside>
      <div class="flex flex-col flex-1">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-red-600 dark:text-red-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-red"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>

          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Cadastrar Episodio
            </h2>
            <!-- CTA -->

            <div
              class="episodio px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >     
            <form action="">
              <div class="errortxt"></div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Piloto" name="nome"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Anime
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                  name="id_categoria" id="id_categoria"
                >
                <option value="">Escolha a Categoria</option>
                    <?php
                      $result_cat_post = "SELECT * FROM anime ORDER BY nome";
                      $resultado_cat_post = mysqli_query($conn, $result_cat_post);
                      while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                        echo '<option value="'.$row_cat_post['idAnime'].'">'.$row_cat_post['nome'].'</option>';
                      }
                    ?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Temporada
                </span>

                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                  name="id_sub_categoria" id="id_sub_categoria"
                >
                <option value="">Escolha Temporada</option>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Video</span>

                <div class="input__item">

                  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                      <div class="file-upload" style="max-width: 300px">
                        <div class="file-select">
                          <div class="file-select-button" id="fileName">Enviar video</div>
                          <div class="file-select-name" id="noFile">Video do Episodio</div> 
                          <input type="file" name="image" id="chooseFile">
                        </div>
                      </div>
                  </div>
              </label>
             
              <div>
                <br>
                <button
                  class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                >
                  Cadastrar
                </button>
              </div>

            </div>
          </form>
            
          </div>
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Cadastrar Temporada
            </h2>
            <!-- CTA -->

            <div
              class="temporada px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="">
            <div class="errortxt"></div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Black Clover"
                  name="nome"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Anime
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                  name="anime"
                >
                <?php 
                $sql2 = mysqli_query($conn, "SELECT * FROM anime");
                while($row2 = mysqli_fetch_assoc($sql2)){
                  echo "<option value='". $row2['idAnime'] ."'>". $row2['nome'] ."</option>";
                }
                ?>
                </select>
              </label>
             
                <br>
                <button
                  class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                >
                  Cadastrar
                </button>

            </div>
          </form>
            
          </div>
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Cadastrar Categoria
            </h2>
            <!-- CTA -->

            <div
              class="categoria px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="">
              <div class="errortxt"></div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="nome" placeholder="Romance"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Capa</span>

                <div class="input__item">

                  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                      <div class="file-upload" style="max-width: 300px">
                        <div class="file-select">
                          <div class="file-select-button" id="fileName">Enviar image da capa</div>
                          <div class="file-select-name" id="noFile">Image para capa</div> 
                          <input type="file" name="image" id="chooseFile">
                        </div>
                      </div>
                  </div>
              </label>
             
                  <br>
                <button
                  class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                >
                  Cadastrar
                </button>

            </div>
          </form>
            
          </div>
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Cadastrar Anime
            </h2>
            <!-- CTA -->

            <div
              class="anime px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="">
              <div class="errortxt"></div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  name="nome" placeholder="Black Clover"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Categoria
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                  name="categoria"
                >
                <?php 

                $sql = mysqli_query($conn, "SELECT * FROM categoria");
                while($row = mysqli_fetch_assoc($sql)){
                  echo "<option value='". $row['idCategoria'] ."'>". $row['nome'] ."</option>";
                }
                ?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descrição</span>
                <textarea
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:focus:shadow-outline-gray"
                  rows="3"
                  placeholder="Digite descrição do anime"
                  name="descricao"
                ></textarea>
                <br>
                <span class="text-gray-700 dark:text-gray-400">Dica: Coloque 250 caracteres...</span>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Capa</span>

                <div class="input__item">

                  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                      <div class="file-upload" style="max-width: 300px">
                        <div class="file-select">
                          <div class="file-select-button" id="fileName">Enviar image da capa</div>
                          <div class="file-select-name" id="noFile">Image para capa</div> 
                          <input type="file" name="image" id="chooseFile">
                        </div>
                      </div>
                  </div>
                  <br>
                  <span class="text-gray-700 dark:text-gray-400">Dica: Coloque uma foto qualidade</span>
              </label>
             
                <br>
                <button
                  class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                >
                  Cadastrar
                </button>

            </div>
          </form>
          </div>
          </div>
        </main>
      </div>
    </div>

    <script src="assets/js/forms.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
		
		<script type="text/javascript">
		$(function(){
			$('#id_categoria').change(function(){
				if( $(this).val() ) {
					$('#id_sub_categoria').hide();
					$.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Temporada </option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
						}	
						$('#id_sub_categoria').html(options).show();
					});
				} else {
					$('#id_sub_categoria').html('<option value="">Escolha Temporada</option>');
				}
			});
		});
		</script>
  </body>
</html>
