
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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Cadastro</a></li>
                        <li><a href="#">Termos de uso</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contato</h4>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br>
                        <strong>Telefone:</strong> +1 5589 55488 55<br>
                        <strong>Whatsapp:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Assine nossa Newsletter</h4>
                    <p>Mantenha-se informado e atualizado com todos os eventos e ações da Associação dos Ex-alunos do
                    CMS. Inscreva-se para receber a nossa Newsletter em seu email. Eventos, confraternizações, promoções,
                     convênios e muito mais.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Inscreva-se">
                    </form>
                </div>

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
<script type="text/javascript">
    function handleInput(e) {
        var ss = e.target.selectionStart;
        var se = e.target.selectionEnd;
        e.target.value = e.target.value.toUpperCase();
        e.target.selectionStart = ss;
        e.target.selectionEnd = se;
    }
</script>
@livewireScripts
</body>

</html>
