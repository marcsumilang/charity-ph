@extends('cores.layouts.email')

@section('content')
    <div class='movableContent'>
        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
            <tr>
                <td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
                    <div class="contentEditableContainer contentTextEditable">
                        <div class="contentEditable" align='center'>
                            <h2>Donation Successful</h2>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="100">&nbsp;</td>
                <td width="400" align="center">
                    <div class="contentEditableContainer contentTextEditable">
                        <div class="contentEditable" align='left'>
                            <p>You have received a donation from {{$data->table->first_name}} {{$data->table->last_name}} ,
                                <br/><br/>
                                Amount: {{$data->amount}}<br/><br/>
                                Email: {{$data->email}}<br/><br/>
                                Payment Type: PayPal<br/><br/>
                                <br/><br/>

                            </p>
                        </div>
                    </div>
                </td>
                <td width="100">&nbsp;</td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
            <tr>
                <td width="200">&nbsp;</td>
                <td width="200" align="center" style="padding-top:25px;">
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
                        <tr>

                        </tr>
                    </table>
                </td>
                <td width="200">&nbsp;</td>
            </tr>
        </table>
    </div>

@endsection