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
                    @if($checkPermissao('produtos') && $checkCriar('produtos'))

                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Informações do Produto </div>
                            </div>

                            <div class="card-body ">
                                <form method="post" action="{{ route('produtos.criar') }}">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="habilitado">Habilitado?</label>
                                            <select class="form-control" id="habilitado" name="habilitado" required="">
                                                <option value="">Escolha</option>
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                            </select>
                                            <x-input-error class="mt-2" :messages="$errors->get('habilitado')" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="O nome do produto" required autofocus autocomplete="nome">
                                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="categoria_id">Categoria</label>
                                            <select class="form-control" id="categoria_id" name="categoria_id" required="">
                                                <option value="">Escolha uma Categoria</option>
                                                @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                                @endforeach
                                            </select>                                        
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="preco">Preço</label>
                                            <input type="number" step="0.01" class="form-control" id="preco" name="preco" placeholder="O preço do produto" required autofocus autocomplete="preco">
                                            <x-input-error class="mt-2" :messages="$errors->get('preco')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="estoque">Estoque</label>
                                            <input type="number" step="1" class="form-control" id="estoque" name="estoque" placeholder="O preço do produto" required autofocus autocomplete="estoque">
                                            <x-input-error class="mt-2" :messages="$errors->get('estoque')" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="largura">Largura</label>
                                            <input type="number" step="0.01" class="form-control" id="largura" name="largura" placeholder="A preço do produto" required autofocus autocomplete="largura">
                                            <x-input-error class="mt-2" :messages="$errors->get('largura')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="altura">Altura</label>
                                            <input type="number" step="0.01" class="form-control" id="altura" name="altura" placeholder="A preço do produto" required autofocus autocomplete="altura">
                                            <x-input-error class="mt-2" :messages="$errors->get('altura')" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="profundidade">Profundidade</label>
                                            <input type="number" step="0.01" class="form-control" id="profundidade" name="profundidade" placeholder="A preço do produto" required autofocus autocomplete="profundidade">
                                            <x-input-error class="mt-2" :messages="$errors->get('profundidade')" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="volume">Volume</label>
                                            <input type="number" step="0.01" class="form-control" id="volume" name="volume" placeholder="A preço do produto" required autofocus autocomplete="volume">
                                            <x-input-error class="mt-2" :messages="$errors->get('volume')" />
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="descricao">Descrição do Produto</label>
                                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
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
