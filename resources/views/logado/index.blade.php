<?php

use PagSeguro\Configuration\Configure;
use PagSeguro\Helpers\Xhr;
use PagSeguro\Library;

Library::initialize();
Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try {
    if (Xhr::hasPost()) {
        $response = \PagSeguro\Services\Transactions\Notification::check(
            Configure::getAccountCredentials()
        );
    } else {
        throw new \InvalidArgumentException($_POST);
    }

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
?>
@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Retorno do PagSeguro</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <h4>Voltei da loja</h4>
                                    <div class="divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
