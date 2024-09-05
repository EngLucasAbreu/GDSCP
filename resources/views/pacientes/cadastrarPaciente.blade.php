@extends('layouts.main')

@section('title', 'GDSCP - Cadastrar Paciente')

@section('content')
@include('msg.message')
<div class="container-cad">
    <h3>CADASTRAR PACIENTE</h3>
    <hr>
    <br>
    <form action="/pacientes/store" method="POST">
        @csrf  {{-- Codigo de segurança para formulário, todos devem conter --}}
        <ul class="row form">
            <li class="col-sm-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </li>
            <li class="col-sm-4">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" id="nascimento" name="nascimento" required>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required>
            </li>
            <li class="col-sm">
                <label for="cns">CNS</label>
                <input type="text" id="cns" name="cns" required>
            </li>
            <li class="col-sm">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" required>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                    <option value="N">Prefiro não informar</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-4">
                <label for="comorbidade">Comorbidade</label>
                <select id="comorbidade" name="comorbidade">
                    <option value="" selected>Selecione uma opção</option>
                    <option value="arritmias_cardiacas">Arritmias cardíacas</option>
                    <option value="cardiopatia_hipertensiva">Cardiopatia hipertensiva</option>
                    <option value="cardiopatias_congenitas_no_adulto">Cardiopatias congênitas no adulto</option>
                    <option value="cirrose_hepatica">Cirrose hepática</option>
                    <option value="diabetes_mellitus">Diabetes mellitus</option>
                    <option value="doenca_cerebrovascular">Doença cerebrovascular</option>
                    <option value="doenca_renal_cronica">Doença renal crônica</option>
                    <option value="doencas_da_aorta_dos_grandes_vasos_e_fistulas_arteriovenosas">Doenças da aorta, dos grandes vasos e fístulas arteriovenosas</option>
                    <option value="hemoglobinopatias_graves">Hemoglobinopatias graves</option>
                    <option value="hipertensao_arterial">Hipertensão arterial</option>
                    <option value="hipertensao_arterial_resistente_har">Hipertensão Arterial Resistente (HAR)</option>
                    <option value="hipertensao_pulmonar_cor_pulmonale">Hipertensão pulmonar / Cor-pulmonale</option>
                    <option value="imunossuprimidos">Imunossuprimidos</option>
                    <option value="insuficiencia_cardiaca">Insuficiência cardíaca</option>
                    <option value="miocardiopatias_e_pericardiopatias">Miocardiopatias e pericardiopatias</option>
                    <option value="obesidade_morbida">Obesidade mórbida</option>
                    <option value="pneumopatias_cronicas_graves">Pneumopatias crônicas graves</option>
                    <option value="proteses_valvares_e_dispositivos_cardiacos_implantados">Próteses valvares e dispositivos cardíacos implantados</option>
                    <option value="reumaticos_como_portadores_de_espondilite_anquilosante">Reumáticos como portadores de espondilite anquilosante</option>
                    <option value="sindrome_de_down">Síndrome de Down</option>
                </select>
            </li>
        </ul>
        <br>
        <br>
        <h3>REGISTRAR INCIDENTE</h3>
        <hr>
        <br>
        <ul class="row form">
            <li class="col-sm-2">
                <label for="internacao">Data de Internação</label>
                <input type="date" id="internacao" name="internacao" required>
            </li>
            <li class="col-sm-2">
                <label for="evento">Data do Evento</label>
                <input type="date" id="evento" name="evento" required>
            </li>
            <li class="col-sm-4">
                <label for="sala">Sala</label>
                <input type="text" id="sala" name="sala" required>
            </li>
            <li class="col-sm-4">
                <label for="leito">Leito</label>
                <input type="text" id="leito" name="leito" required>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm">
                <label for="localLesao">Local de Lesão</label>
                <select id="localLesao" name="localLesao" required>
                    <option value="1">Cabeça</option>
                    <option value="2">Pescoço</option>
                    <option value="3">Tronco</option>
                    <option value="4">Membros Superiores</option>
                    <option value="5">Membros Inferiores</option>
                </select>
            </li>
            <li class="col-sm">
                <label for="tipoLesao">Tipo de Lesão</label>
                <select id="tipoLesao" name="tipoLesao" required>
                    <option value="1">Ferida Cirúrgica</option>
                    <option value="2">Úlcera por Pressão</option>
                    <option value="3">Queimadura</option>
                    <option value="4">Outro</option>
                </select>
            </li>
            <li class="col-sm">
                <label for="tratamento">Tipo de Tratamento</label>
                <select id="tratamento" name="tratamento" required>
                    <option value="1">Curativo</option>
                    <option value="2">Medicamentoso</option>
                    <option value="3">Cirúrgico</option>
                    <option value="4">Outro</option>
                </select>
            </li>
        </ul>
        <ul class="row form">
            <li class="col-sm-12">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" required>
            </li>
        </ul>
        <div class="d-flex justify-content-end ">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
