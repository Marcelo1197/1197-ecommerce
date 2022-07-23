    <!-- Footer -->
    <footer>
        <i>Desarrolado por <b>Marcelo Sanchez</b> - Taller De Programacion 1 - LSI, UNNE.</i>
    </footer> 
    
    <!-- JavaScript Bundle con Popper para que funcione Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<!-- JavaScript necesario para el mapa de google en la pagina Informacion de Contacto -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6vjihp10syz5sSOr0ds19X36JeRaqwy8&callback=initMap&v=weekly"
      defer
    ></script>
    
    <?= script_tag(['src' => 'assets/js/main.js']); ?>
    <?= script_tag(['src' => 'assets/js/jquery-3.2.1_Productos.js']); ?>
    <?= script_tag(['src' => 'assets/js/scriptProductos.js']); ?>

    </body>
</html>