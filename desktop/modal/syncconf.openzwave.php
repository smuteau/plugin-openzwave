<?php
/* This file is part of Plugin openzwave for jeedom.
 *
 * Plugin openzwave for jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Plugin openzwave for jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Plugin openzwave for jeedom. If not, see <http://www.gnu.org/licenses/>.
 */
if (!isConnect('admin')) {
    throw new Exception('{{401 - Accès non autorisé}}');
}
?>
<div id='div_syncconfOpenzwaveAlert' style="display: none;"></div>
<a class="btn btn-warning pull-right" data-state="1" id="bt_openzwaveLogStopStart"><i class="fa fa-pause"></i> {{Pause}}</a>
<input class="form-control pull-right" id="in_openzwaveLogSearch" style="width : 300px;" placeholder="{{Rechercher}}"/>
<br/><br/><br/>
<pre id='pre_openzwavesyncconf' style='overflow: auto; height: 90%;with:90%;'></pre>

<script>
    $.ajax({
        type: 'POST',
        url: 'plugins/openzwave/core/ajax/openzwave.ajax.php',
        data: {
            action: 'syncconfOpenzwave',
        },
        dataType: 'json',
        global: false,
        error: function (request, status, error) {
            handleAjaxError(request, status, error, $('#div_syncconfOpenzwaveAlert'));
        },
        success: function () {
            jeedom.log.autoupdate({
                log: 'openzwave_syncconf',
                display: $('#pre_openzwavesyncconf'),
                search: $('#in_openzwaveLogSearch'),
                control: $('#bt_openzwaveLogStopStart'),
            });
        }
    });
</script>