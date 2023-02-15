@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ __('installer_messages.environment.classic.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-code fa-fw" aria-hidden="true"></i> {{ __('installer_messages.environment.classic.title') }}
@endsection
<style>
    
    .tk-notify {
        border-radius: 4px;
        padding: 16px 20px;
        align-items: center;
        justify-content: space-between;
        box-shadow: inset 0px -1px 0px #eeeeee;
        flex-wrap: nowrap;
    }
    .tk-notify .tk-btnholder {
        flex: none;
    }
    .tk-notify_title {
        align-items: center;
        flex-wrap: nowrap;
    }
    .tk-notify + .tk-notify {
        box-shadow: inset 0px -1px 0px #EEEEEE, inset 0px -1px 0px #EEEEEE;
    }

    .tk-notify-content {
        margin-left: 0;
    }
    .tk-notify-content p {
        margin: 0;
        line-height: 22px;
        color: #B15157;
        font-size: 14px;
        font-weight: 400;
        text-align: center;
    }

    .tk-notify-alert {
        background: #FDF1F0;
    }

 </style>   

@section('container')

    <form method="post" action="{{ route('LaravelInstaller::environmentSaveClassic') }}">
        {!! csrf_field() !!}
        <textarea class="textarea" name="envConfig">{{ $envConfig }}</textarea>
        <div class="buttons buttons--right">
            <button class="button button--light" type="submit">
            	<i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i>
             	{!! __('installer_messages.environment.classic.save') !!}
            </button>
        </div>
    </form>

    @if( ! isset($environment['errors']))
        <div class="tk-notify tk-notify-alert">
            <div class="tk-notify_title">
                <div class="tk-notify-content">
                    <p>{!! __('installer_messages.environment.classic.save_install') !!}</p>
                </div>
            </div>
        </div>
        <div class="buttons-container">
            <a class="button float-left" href="{{ route('LaravelInstaller::environmentWizard') }}">
                <i class="fa fa-sliders fa-fw" aria-hidden="true"></i>
                {!! __('installer_messages.environment.classic.back') !!}
            </a>
            <a class="button float-right" href="{{ route('LaravelInstaller::database') }}">
                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                {!! __('installer_messages.environment.classic.install') !!}
                <i class="fa fa-angle-double-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection