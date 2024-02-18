<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <script src="{{asset('js/configuracion.js') }}"></script>
  <title>Document</title>
</head>
<body>
  <!-- <h2 class="title">Configuracion</h2> -->
  
  <div class="container">
    <div class ='langWrap'>
      <a href='#' language='Español' class='active'>ESP</a>
      <a href='#' language='Ingles'>EN</a>
      <a href='#' language='Ruso'>Ру</a>
      <!-- <h2>Nombre</h2>
      <input type="text" name="nombre" value=""><br>
      <h2>Apellido Paterno</h2>
      <input type="text" name="apellido" value=""><br>
      <h2>Correo</h2>
      <input type="mail" name="correo" value=""><br>
      <h2>Telefono</h2>
      <input type="number" name="telefono" value=""><br>
      <h2>Contraseña</h2>
      <input type="password" name="contraseña" value="contraseñaejemplo"><br>

      <input type="submit" value="Guardar"> -->
    </div>
    <div class='content'>
      <h2 class='title'>Configuracion</h2>
      
      <p class='description'>Pantalla de configuracion</p> <br>
      
      <p class='description1'>Permitir descargar musica</p>
      <label class='switch'>
        <input type='checkbox' >
        <span class='slider'></span>
      </label>
      <p class='description2'>Usar datos celulares para descargar musica</p>
      <label class='switch'>
        <input type='checkbox' >
        <span class='slider'></span>
      </label>
      <p class='description3'>Modo en linea</p>
      <label class='switch'>
        <input type='checkbox' >
        <span class='slider'></span>
      </label>
      <p class='description4'>Mostrar mensajes sobre nuevos lanzamientos</p>
      <label class='switch'>
        <input type='checkbox' >
        <span class='slider'></span>
      </label>
      <p class='description5'>Mostrar archivos locales</p>
      <label class='switch'>
        <input type='checkbox' >
        <span class='slider'></span>
      </label>

      <button class="theme-toggle-button">
    <svg class="icon" style="width:24px;height:24px" viewBox="0 0 24 24">
      <path fill="currentColor" d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z" />
    </svg>
    <p class ='boton'>Cambiar tema</p>
  </button>
  <div class="sun-moon-container">
    <svg class="sun" style="width:24px;height:24px" viewBox="0 0 24 24">
      <path d="M3.55,18.54L4.96,19.95L6.76,18.16L5.34,16.74M11,22.45C11.32,22.45 13,22.45 13,22.45V19.5H11M12,5.5A6,6 0 0,0 6,11.5A6,6 0 0,0 12,17.5A6,6 0 0,0 18,11.5C18,8.18 15.31,5.5 12,5.5M20,12.5H23V10.5H20M17.24,18.16L19.04,19.95L20.45,18.54L18.66,16.74M20.45,4.46L19.04,3.05L17.24,4.84L18.66,6.26M13,0.55H11V3.5H13M4,10.5H1V12.5H4M6.76,4.84L4.96,3.05L3.55,4.46L5.34,6.26L6.76,4.84Z" />
    </svg>

    <svg class="moon" style="width:24px;height:24px" viewBox="0 0 24 24">
      <path d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
    </svg>
  </div>
      
    </div>
  </div>
  <script>
    const langE1 = document.querySelector('.langWrap');
    const link = document.querySelectorAll('a');
    const titleE1 = document.querySelector('.title');
    const descrE1 = document.querySelector('.description');
    const botonE1 = document.querySelector('.boton');
    const configE1 = document.querySelector('.description1');
    const configE2 = document.querySelector('.description2');
    const configE3 = document.querySelector('.description3');
    const configE4 = document.querySelector('.description4');
    const configE5 = document.querySelector('.description5');

    link.forEach(el =>{
      el.addEventListener('click', () =>{
        langE1.querySelector('.active').classList.remove('active');
        el.classList.add('active');

        const attr = el.getAttribute('language');

        titleE1.textContent = data[attr].title;
        descrE1.textContent = data[attr].description;
        botonE1.textContent = data[attr].boton;
        configE1.textContent = data[attr].description1;
        configE2.textContent = data[attr].description2;
        configE3.textContent = data[attr].description3;
        configE4.textContent = data[attr].description4;
        configE5.textContent = data[attr].description5;
      })

    });

    var data = {
			  "Español": 
			  {
			    "title": "Configuracion",
			    "description": 
				    "Pantalla de configuracion.",
          'boton': 'Cambiar tema',
          'description1': 'Permitir descargar musica',
          'description2': 'Usar datos celulares para descargar musica',
          'description3': 'Modo en linea',
          'description4': 'Mostrar mensajes sobre nuevos lanzamientos',
          'description5': 'Mostrar archivos locales'

			  },
        'Ruso':
        {
        'title': 'параметр',
        'description':
          'раздел конфигурации',
          'boton': ' Сменить тему',
          'description1': 'разрешить скачивание музыки',
          'description2': 'Используйте сотовые данные для загрузки музыки',
          'description3': 'онлайн режим',
          'description4': 'Показывать сообщения о новых выпусках',
          'description5': 'показать локальные файлы'


        },
        'Ingles':
        {
          'title': 'Settings',
          'description': 'Settings',
          'boton': 'Change Theme',
          'description1': 'Download music',
          'description2': 'Use movile data to download music',
          'description3': 'OnLine mode',
          'description4': 'Show messages about new music',
          'description5': 'Show local archives'



        }
    
      }
  </script>
</body>
</html>