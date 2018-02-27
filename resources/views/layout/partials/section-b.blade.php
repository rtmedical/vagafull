<!-- Índice de Qualidade - R<sub>50</sub> -->
<section id="section-b" class="section">
  <h5 class="header center teal-text text-lighten-2">Índice de Qualidade - R<sub>50</sub></h5>
  <div class="row">
    @foreach($mevs as $mev)
      <div class="col s12 l6">
        <div class="card hoverable">
          <div class="card-content">
            <span class="card-title center"><h5>{{$mev}} MeV</h5></span>
            <div class="row">
              <div class="input-field col s4 offset-s4">
                <input id="{{$mev}}mev_r50" name="{{$mev}}mev_r50" 
                  type="number" step="any" class="validate experimental_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mev.'mev_r50') ? old($mev.'mev_r50') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_r50[$loop->index]->r50 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
                <label for="{{$mev}}mev_r50">R<sub>50</sub></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mev}}mev_input-1" name="{{$mev}}mev_input-1" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mev.'mev_input-1') ? old($mev.'mev_input-1') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_r50[$loop->index]->input_1 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
              <div class="input-field col s4">
                <input id="{{$mev}}mev_output-1" type="number" step="any" 
                  class="input_data_color" disabled>
              </div>
              <div class="input-field col s4">
                <input id="{{$mev}}mev_input-2" name="{{$mev}}mev_input-2" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mev.'mev_input-2') ? old($mev.'mev_input-2') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_r50[$loop->index]->input_2 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </div>
            <div class="row">
              <div class="input-field col s4">
                <input id="{{$mev}}mev_input-3" name="{{$mev}}mev_input-3" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mev.'mev_input-3') ? old($mev.'mev_input-3') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_r50[$loop->index]->input_3 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
              <div class="input-field col s4">
                <input id="{{$mev}}mev_output-2" type="text" class="output_data_color" disabled>
              </div>
              <div class="input-field col s4">
                <input id="{{$mev}}mev_input-4" name="{{$mev}}mev_input-4" 
                  type="number" step="any" class="validate table_data_color" 
                  placeholder="{{ $mode !== 'show' ? 'Insira dado...' : '' }}"
                  value="{{ !!old($mev.'mev_input-4') ? old($mev.'mev_input-4') :
                    (isset($spreadsheet) ? 
                      $spreadsheet->indices_r50[$loop->index]->input_4 : '') }}"
                  {{ $mode === 'show' ? 'disabled' : '' }}
                >
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <strong>k<sub>Q,Qint</sub> =</strong> 
                <div class="input-field inline">
                  <input id="{{$mev}}mev_k_q-qint" name="{{$mev}}mev_k_q-qint"
                    type="text" class="output_data_color" readonly
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
