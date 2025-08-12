@php
    $isEdit = isset($cliente);
@endphp

<form onsubmit="ativarBusy(this)" method="POST" action="{{ $isEdit ? route('clientes.update', $cliente->id) : route('clientes.store') }}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <fieldset>
        <label>
            Nome do cliente
            <input name="nome" placeholder="Ex: Paulo Junior" value="{{ old('nome', $isEdit ? $cliente->nome : '') }}" />
        </label>
        <div class="grid">
            <label>
                Celular
                <input name="celular" placeholder="Ex: (54) 12345-6789" value="{{ old('celular', $isEdit ? $cliente->celular : '') }}" />
            </label>
            <label>
                Data de Nascimento
                <input name="data_nascimento" placeholder="Ex: 01/01/2000" value="{{ old('data_nascimento', $isEdit ? $cliente->data_nascimento : '') }}" />
            </label>
        </div>
        <div class="grid">
            <label>
                CPF
                <input name="cpf" placeholder="Ex: 012.345.678-90" value="{{ old('cpf', $isEdit ? $cliente->cpf : '') }}" />
            </label>
            <label>
                CEP
                <input name="cep" placeholder="Ex: 95320-000" value="{{ old('cep', $isEdit ? $cliente->cep : '') }}" />
            </label>
        </div>
        <div class="grid">
            <label>
                Estado
                <input name="estado" placeholder="Ex: Santa Catarina" value="{{ old('estado', $isEdit ? $cliente->estado : '') }}" />
            </label>
            <label>
                Cidade
                <input name="cidade" placeholder="Ex: Florianópolis" value="{{ old('cidade', $isEdit ? $cliente->cidade : '') }}" />
            </label>
        </div>
        <label>
            Endereço
            <input name="endereco" placeholder="Ex: RODOVIA BR 101" value="{{ old('endereco', $isEdit ? $cliente->endereco : '') }}" />
        </label>
    </fieldset>

    <button type="submit">{{ $isEdit ? 'Salvar' : 'Cadastrar' }}</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/addons/cleave-phone.br.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Cleave('input[name="celular"]', {
            delimiters: ['(', ') ', '-'],
            blocks: [0, 2, 5, 4],
            numericOnly: true
        });

        new Cleave('input[name="data_nascimento"]', {
            date: true,
            datePattern: ['d', 'm', 'Y']
        });

        new Cleave('input[name="cpf"]', {
            delimiters: ['.', '.', '-'],
            blocks: [3, 3, 3, 2],
            numericOnly: true
        });

        new Cleave('input[name="cep"]', {
            delimiters: ['-'],
            blocks: [5, 3],
            numericOnly: true
        });
    });
</script>
<script>
    function ativarBusy(form) {
        const btn = form.querySelector('button[type="submit"]')
        btn.setAttribute('aria-busy', 'true')
        btn.setAttribute('aria-label', 'Please wait')
        btn.textContent = '{{ $isEdit ? "Aguarde..." : "Aguarde..." }}'
    }
</script>
