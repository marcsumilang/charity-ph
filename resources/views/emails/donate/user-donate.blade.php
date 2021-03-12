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
                            <p>Hi {{$data->table->first_name}} {{$data->table->last_name}},
                                <br/><br/>
                                On behalf of the team from Volunteers Against Poverty, we would like to express our
                                heartfelt thanks for your generous donation of {{$data->total}} made
                                on {{$data->created_at}}
                                <br/><br/>
                                Your donation will greatly help us in our goal to build a society of braver, creative,
                                and productive filipinos. May your generous heart continue to bless others, and we do
                                hope for your continued support in our future projects.
                                <br/><br/>
                                All the best,
                                <br/>
                                Volunteers Against Poverty
                                <br>
                                <Br>
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