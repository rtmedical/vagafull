<!-- Conversão de unidades de pressão e legendas -->
<section id="section-c" class="section">
  <h5 class="header center teal-text text-lighten-2">Conversão de unidades de pressão e legendas</h5>
  <div class="row">
    <div class="col m12 l6 center">
      <div class="col s6">
        <div class="row">
          <div class="col s12">
            <div class="input-field inline">
              <input id="input-mmHg" name="input-mmHg" type="number" step="any" class="validate"
                placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                value="{{ !!old('input-mmHg') ? old('input-mmHg') :
                  (isset($spreadsheet) ? 
                    $spreadsheet->conversao_unid_pressao->mmhg : '') }}"
                {{ $mode === 'show' ? 'disabled' : '' }}
              >
            </div>
            mmHg
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="input-field inline">
              <input id="input-mbar" name="input-mbar" type="number" step="any" class="validate" 
                placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                value="{{ !!old('input-mbar') ? old('input-mbar') :
                  (isset($spreadsheet) ? 
                    $spreadsheet->conversao_unid_pressao->mbar : '') }}"
                {{ $mode === 'show' ? 'disabled' : '' }}
              >
            </div>
            mbar(hPa)
          </div>
        </div>
      </div>
      <div class="col s6">
        <div class="row">
          <div class="col s12">
            <div class="input-field inline">
              <input id="output-mbar" type="number" step="any" disabled value="0.00">
            </div>
            mbar(hPa)
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="input-field inline">
              <input id="output-mmHg" type="number" step="any" disabled value="0.00">
            </div>
            mmHg
          </div>
        </div>
      </div>
    </div>
    <div class="col m12 l6 valign-wrapper">
      <div class="col s6 center">Legenda:</div>
      <div class="col s6">
        <div class="row"><span class="color-block input_data_color"></span> Dados de entrada</div>
        <div class="row"><span class="color-block experimental_data_color"></span> Dados de Experimentais</div>
        <div class="row"><span class="color-block output_data_color"></span> Dados de Saída</div>
        <div class="row"><span class="color-block table_data_color"></span> Tabela 14 - TRS nº 398</div>
      </div>
    </div>
  </div>
</section>
