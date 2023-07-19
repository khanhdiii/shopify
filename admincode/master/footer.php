    </div>
    </div>

    <script>
$(document).ready(function() {
    $('.main-nav-list .button-table a.button-table-drop').click(function() {
        $(this).parent('li').children('.sub-nav-list-table').slideToggle();
        $('.drop-menu-icon').toggleClass('fa-chevron-right fa-chevron-down');
    });
});
    </script>

    <!-- Button menu -->
    <script>
$('.btnhide').click(function() {
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
});
$('.feat-btn').click(function() {
    $('nav ul .feat-show').toggleClass("show");
    $('nav ul .first').toggleClass("rotate");
});
$('.serv-btn').click(function() {
    $('nav ul .serv-show').toggleClass("show1");
    $('nav ul .second').toggleClass("rotate");
});
$('nav ul li').click(function() {
    $(this).addClass("active").siblings().removeClass("active");
});
    </script>
    <script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
    </script>

    </body>

    </html>