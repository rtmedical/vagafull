<!-- Tabela de Decaimento para Fontes de <sup>60</sup>Co -->
<section id="section-d" class="section">
  <h5 class="header center teal-text text-lighten-2">Tabela de Decaimento para Fontes de <sup>60</sup>Co</h5>
  <div class="row">
    <div class="col m12 l6 valign-wrapper">
      <p>Taxa de Dose na Água (cGy/min)</p>
      <p>Campo 10 x 10 cm<sup>2</sup></p>
      <p>DFS = 80 cm</p>
      <p>Prof. = 0,5 cm</p>
    </div>
    <div class="col m12 l6">
      <table class="centered">
        <thead>
          <tr>
            <th>Data</th>
            <th>Co-60</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="input-field inline tooltipped" 
                data-position="left" data-delay="50" data-tooltip="Data de referência da fonte"
              >
                <input id="60co_input-1" name="60co_input-1" type="date" 
                  class="validate input_data_color"
                  value="{{ !!old('60co_input-1') ? old('60co_input-1') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->decaimento_60Co->input_1 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </td>
            <td>
              <div class="input-field inline tooltipped"
                data-position="right" data-delay="50" 
                data-tooltip="Taxa de dose da fonte na data de referência"
              >
                <input id="60co_input-2" name="60co_input-2" type="number" step="any"
                  class="validate output_data_color"
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}" 
                  value="{{ !!old('60co_input-2') ? old('60co_input-2') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->decaimento_60Co->input_2 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-field inline tooltipped"
                data-position="left" data-delay="50" data-tooltip="Qualquer data que se queira"
              >
                <input id="60co_input-3" name="60co_input-3" type="date" 
                  class="validate input_data_color"
                  value="{{ !!old('60co_input-3') ? old('60co_input-3') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->decaimento_60Co->input_3 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </td>
            <td>
              <div class="input-field inline tooltipped"
                data-position="right" data-delay="50" data-tooltip="Taxa de dose na data escolhida"
              >
                <input id="60co_output-1" name="60co_output-1" 
                  type="number" step="any" class="output_data_color" readonly
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-field inline tooltipped"
                data-position="left" data-delay="50" data-tooltip="Data atual"
              >
                <input id="60co_output-2" name="60co_output-2" 
                  type="date" class="input_data_color" readonly
                >
              </div>
            </td>
            <td>
              <div class="input-field inline tooltipped"
                data-position="right" data-delay="50" data-tooltip="Taxa de dose no dia de hoje"
              >
                <input id="60co_output-3" name="60co_output-3" 
                  type="number" step="any" class="output_data_color" readonly
                >
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
