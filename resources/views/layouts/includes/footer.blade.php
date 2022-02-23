
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Ass. Ex-Alunos CMS</h3>
                    <p>A Associação dos Ex-Alunos do Colégio Militar de Salvador é uma entidade sem fins lucrativos que vive
                    das contribuições pagas pelos seus associados anualmente. Nosso objetivo é fomentar as amizades e criar
                    um ambiente de camaradagem, característico do sistema de Colégios Militares. Qualquer ex-aluno do CMS
                        pode fazer parte da nossa agremiação independente do tempo em que passaram dentro do CMS. Nossos
                    valores são eternos.</p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><a href="{{route('/')}}">Home</a></li>
                        <li><a href="{{route('/')}}#about">Quem Somos</a></li>
                        <li><a href="{{route('/')}}#services">Serviços</a></li>
                        @if(Auth::guest())
                            <li><a href="{{ route('register')}}">Cadastro</a></li>
                        @elseif(Auth::user()->cad_atualizado == 'n')
                            <li><a href="{{route('profile.show-cms')}}">Perfil</a></li>
                        @else
                            <li><a href="{{route('profile.show')}}">Perfil</a></li>
                        @endif
                        <li><a href="#">Termos de uso</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contato</h4>
                    <p>
                        Rua Território do Amapá, 455 <br>
                        Salvador, BA 41.830-540<br>
                        Brasil <br>
                        <strong>Telefone:</strong> +55 (71) 999 578 916<br>
                        <strong>Whatsapp:</strong> +55 (71) 999 578 916<br>
                        <strong>Email:</strong> assoc.exalcms@gmail.com<br>
                    </p>

                    <div class="social-links">
                        <!--<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>-->
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <!--
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>-->
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <img src="{{asset('site/img/marca_assoc_b.png')}}" alt="" width="100%" class="img-fluid">
                </div>

               <!-- NEWSLETTER
               <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Assine nossa Newsletter</h4>
                    <p>Mantenha-se informado e atualizado com todos os eventos e ações da Associação dos Ex-alunos do
                    CMS. Inscreva-se para receber a nossa Newsletter em seu email. Eventos, confraternizações, promoções,
                     convênios e muito mais.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Inscreva-se">
                    </form>
                </div>-->

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Marketmix</strong>. Todos os direitos reservados
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('site/vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="{{asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('site/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('site/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('site/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('site/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('site/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('site/vendor/aos/aos.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Template Main JS File -->
<script src="{{asset('site/js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //Para fins de depuração:
        console.log("Entrei aqui.");
        $("#checkTodos_0").click(function(){
            //Para fins de depuração:
            console.log("Checkbox mestre foi clicado!");
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        console.log("saiu aqui.");
    });

</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
    $("#indicado_por").mask("000.000.000-00");
    $("#dtnasc").mask("00/00/0000");
    $("#tel_fixo").mask('(00) 0000-0000');
    $("#celular").mask('(00) 00000-0000');
    $("#tel_com").mask('(00) 0000-00009');
    $("#cep").mask('00.000-000');
</script>
<script>
    $(document).ready(function()
    {
        $("#price").maskMoney({
            prefix: "R$ ",
            decimal: ",",
            thousands: "."
        });
    });
</script>
<script type="text/javascript">
    function handleInput(e) {
        var ss = e.target.selectionStart;
        var se = e.target.selectionEnd;
        e.target.value = e.target.value.toUpperCase();
        e.target.selectionStart = ss;
        e.target.selectionEnd = se;
    }
</script>
<script type="text/javascript">
$(function () {
$('[data-toggle="tooltip"]').tooltip()
});
</script>
@livewireScripts
</body>

</html>
