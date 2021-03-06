</main>

<!-- footer-->
<div class="footer">
    <div class="row no-gutters justify-content-center">
    <div class="col-auto">
            <a href="<?php echo site_url('home')?>" class="active">
                <i class="material-icons">home</i>
                <p>Home</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="<?php echo site_url('Under-Construction')?>" class="">
                <i class="material-icons">call</i>
                <p>Emergency Call</p>
            </a>
        </div>
     <div class="col-auto">
            <a href="<?php echo site_url('Under-Construction')?>" class="">
                <i class="material-icons">shopping_bag </i>
                <p>Shopping</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="<?php echo site_url('Under-Construction')?>" class="">
                <i class="material-icons">account_balance_wallet</i>
                <p>Billing</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="<?php echo site_url('Under-Construction')?>" class="">
                <i class="material-icons">insert_chart_outline</i>
                <p>Services</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="<?php echo site_url('My-Channel')?>" class="">
                <i class="material-icons">account_circle</i>
                <p>My Channel</p>
            </a>
        </div>
    </div>
</div>


<!-- color settings style switcher -->
<div class="color-picker">
    <div class="row">
        <div class="col text-left">
            <div class="selectoption">
                <input type="checkbox" id="darklayout" name="darkmode">
                <label for="darklayout">Dark</label>
            </div>
            <div class="selectoption mb-0">
                <input type="checkbox" id="rtllayout" name="layoutrtl">
                <label for="rtllayout">RTL</label>
            </div>
        </div>
        <div class="col-auto">
            <button class="btn btn-link text-secondary btn-round colorsettings2"><span class="material-icons">close</span></button>
        </div>
    </div>

    <hr class="mt-2">
    <div class="colorselect">
        <input type="radio" id="templatecolor1" name="sidebarcolorselect">
        <label for="templatecolor1" class="bg-dark-blue" data-title="dark-blue"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor2" name="sidebarcolorselect">
        <label for="templatecolor2" class="bg-dark-purple" data-title="dark-purple"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor4" name="sidebarcolorselect">
        <label for="templatecolor4" class="bg-dark-gray" data-title="dark-gray"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor6" name="sidebarcolorselect">
        <label for="templatecolor6" class="bg-dark-brown" data-title="dark-brown"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor3" name="sidebarcolorselect">
        <label for="templatecolor3" class="bg-maroon" data-title="maroon"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor5" name="sidebarcolorselect">
        <label for="templatecolor5" class="bg-dark-pink" data-title="dark-pink"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor8" name="sidebarcolorselect">
        <label for="templatecolor8" class="bg-red" data-title="red"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor13" name="sidebarcolorselect">
        <label for="templatecolor13" class="bg-amber" data-title="amber"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor7" name="sidebarcolorselect">
        <label for="templatecolor7" class="bg-dark-green" data-title="dark-green"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor11" name="sidebarcolorselect">
        <label for="templatecolor11" class="bg-teal" data-title="teal"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor12" name="sidebarcolorselect">
        <label for="templatecolor12" class="bg-skyblue" data-title="skyblue"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor10" name="sidebarcolorselect">
        <label for="templatecolor10" class="bg-blue" data-title="blue"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor9" name="sidebarcolorselect">
        <label for="templatecolor9" class="bg-purple" data-title="purple"></label>
    </div>
    <div class="colorselect">
        <input type="radio" id="templatecolor14" name="sidebarcolorselect">
        <label for="templatecolor14" class="bg-gray" data-title="gray"></label>
    </div>
</div>



<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
<!-- Required jquery and libraries -->
<script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- cookie js -->
<script src="<?php echo base_url()?>assets/js/jquery.cookie.js"></script>

<!-- Swiper slider  js-->
<script src="assets/swiper/js/swiper.min.js"></script>

<!-- Customized jquery file  -->
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<script src="<?php echo base_url()?>assets/js/color-scheme-demo.js"></script>

<!-- PWA app service registration and works -->
<script src="<?php echo base_url()?>assets/js/pwa-services.js"></script>

<!-- page level custom script -->
<script src="<?php echo base_url()?>assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url()?>assets/js/customer.js"></script>
<script type = 'text/javascript'> var base_url= $('#base_url').val();</script>
</body>

</html>
