@include('partials/head')

<body>
    <div class="dash">
        @include('partials/header')
        <div class="dash-app">
            @include('partials/topbar')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if($checkPermissao('categorias') && $checkCriar('categorias'))

                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Informações da Categoria </div>
                            </div>

                            <div class="card-body ">
                                <form method="post" action="{{ route('categorias.criar') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="O nome da categoria" required autofocus autocomplete="nome">
                                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                                        </div>
                                    </div>


                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Criar</button>
                                </form>
                            </div>
                        </div>

                    @else

                        <h1 class="dash-title">Você não tem acesso a este módulo</h1>
                        <a href="#" onclick="history.back()" class="btn btn-primary mb-1">Voltar</a>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('partials/footer')
