

@extends('cores.layouts.email')

@section('content')
<div class='movableContent'>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600"
           class="container">
        <tr>
            <td width="100%" colspan="3" align="center"
                style="padding-bottom:10px;padding-top:25px;">
                <div class="contentEditableContainer contentTextEditable">
                    <div class="contentEditable" align='center'>
                        <h2>Career Submission Successful</h2>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td width="100">&nbsp;</td>
            <td width="400" align="center">
                <div class="contentEditableContainer contentTextEditable">
                    <div class="contentEditable" align='left'>
                        <p>Hi there,  {{$data['name']}},
                            <br/><br/>
                            Your application is duly received. Thank you for showing interest in our organization.
                            <br><br>
                            Hoping for your kind understanding while we review and screen applicants for the post. A member from our team will get in touch with you if you are selected to continue in the recruitment process. We wish you every success.
                            <br><br>
                            All the best,
                            <br>
                            Volunteers Against Poverty Human Resources Team
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </td>
            <td width="100">&nbsp;</td>
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600"
           class="container">
        <tr>
            <td width="200">&nbsp;</td>
            <td width="200" align="center" style="padding-top:25px;">
                <table cellpadding="0" cellspacing="0" border="0" align="center"
                       width="200" height="50">
                    <tr>

                    </tr>
                </table>
            </td>
            <td width="200">&nbsp;</td>
        </tr>
    </table>
</div>

@endsection