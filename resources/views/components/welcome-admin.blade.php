<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-10 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Bem vindo a área administrativa
    </div>

    <div class="mt-6 text-gray-500">
        Você que é administrador nesta área terá condições de atualizar, editar, deletar e inserir
        conteúdos dinamicos no portal da Associação dos Ex-Alunos do CMS. No menu acima você terá
        acesso as diversos setores do site passíveis de atualização. Bom trabalho!
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon_users-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Usuários</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Laravel has wonderful documentation covering every aspect of the framework. Whether you're new to the framework or have previous experience, we recommend reading all of the documentation from beginning to end.
            </div>

            <a href="{{ route('admin.users.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Siga para edição dos usuários</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon-galeria-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Galerias</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
            </div>

            <a href="#">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Acesse agora a edição das galerias</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon-avisos-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Avisos / Notícias</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Laravel Jetstream is built with Tailwind, an amazing utility first CSS framework that doesn't get in your way. You'll be amazed how easily you can build and maintain fresh, modern designs with this wonderful framework at your fingertips.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Use esta ferramenta para publicações</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon-loja-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Nossa Loja</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Authentication and registration views are included with Laravel Jetstream, as well as support for user email verification and resetting forgotten passwords. So, you're free to get started what matters most: building your application.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Acesse aqui para administrar a nossa loja</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon-turma-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Turmas CMS</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                O nosso Recinto Sagrado é formado por turmas. Essa é a grande verdade. Elas interagem entre si
                em diversos momentos, ao longo da trajetória educacional. Além disso, não é dificil encontrar
                os que transitaram em mais de uma turma. Nesta sessão podemos criar turmas e cadastrar todos os
                ex-alunos que se identificam com ela e aumentar a união entre os ex-alunos.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>A edição das turmas já está disponível</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <img src="{{asset('site/img/icones/icon-network-grey.png')}}" alt="" width="6%" class="img-fluid">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Networks</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                A criação desta sessão em nosso Portal tem por objetivo principal aproximar os ex-estudantes do CMS dos
                seus possíveis clientes. Aqui você pode editar informações que foram inseridas pelos próprios alunos, e
                enviar mensagem para os associados para quem estiver precisando de algum dos serviços aqui ofertados
                possam buscar através do nosso portal.
            </div>

            <a href="https://laravel.com/docs">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Faça a ponte entre quem presta um bom serviço e quem precisa</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
