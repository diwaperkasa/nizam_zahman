<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\detail\DetailView;
use kartik\datetime\DateTimePicker;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/**
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.mockjax.js"></script>
    <script src="../src/bootstrap-typeahead.js"></script>

    $this->getView()->registerJs("yourJsGoesHere");
**/

$this->title = 'Jasa Kolam Pelabuhan';
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['/kolam-pelabuhan/cari-kapal'], true);
$typeahead_script = <<< JS
    function delete_table()
    {
        table = document.getElementById("myList");
        while(table.rows.length > 0) {
            table.deleteRow(0);
        }
    }
    function create_table(model)
    {
        table = document.getElementById("myList");
        var key_array = Object.keys(model);
        for (r = 0; r < key_array.length; r++) {
            var key = key_array[r];
            var value = model[key];

            //console.log(key);
            //console.log(value);
            var res = key.split("_");
            var out_key = "";

            for (b = 0; b < res.length; b++) {
                res[b] = res[b].toUpperCase();
                out_key += (res[b] + " ");
            }

            row = document.createElement('tr');
            cell1 = document.createElement('th');
            text1 = document.createTextNode(out_key);
            cell1.appendChild(text1);
            row.appendChild(cell1);

            cell2 = document.createElement('td');
            text2 = document.createTextNode(value);
            cell2.appendChild(text2);
            row.appendChild(cell2);
            table.appendChild(row);
        }
    }
    
    function table_view(model) {
        //console.log(model);
        delete_table();
        create_table(model);
    }

    function get_time()
    {
        var today = new Date();
        var Y = today.getFullYear();
        var M = today.getMonth()+1;
        var D = today.getDate();

        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        var date_time = Y+'-'+M+'-'+D+' '+h+':'+m;

        return date_time;
    }

    function edit_view(model) {
        //console.log(model);
        document.getElementById("id").value = model['id']; 
        document.getElementById("nama_kapal").value = model['nama_kapal']; 
        document.getElementById("tanda_selar").value = model['tanda_selar']; 
        document.getElementById("loa").value = model['loa']; 
        //document.getElementById("panjang_kapal").value = model['panjang_kapal']; 
        document.getElementById("kode_perusahaan").value = model['kode_perusahaan']; 
        //document.getElementById("tempat_gross_akte").value = model['tempat_gross_akte']; 
        //document.getElementById("nomor_gross_akte").value = model['nomor_gross_akte']; 

        if (header_kapal.indexOf(model['nama_kapal']) >= 0)
        {
            document.getElementById("submit_kapal").disabled = true;
            document.getElementById("status_kapal").innerHTML = "Status: Kapal masih di dalam kolam pelabuhan";
        } else
        {
            document.getElementById("submit_kapal").disabled = false;
            document.getElementById("status_kapal").innerHTML = "Status: Kapal sudah keluar kolam pelabuhan";
        } 
    }

    document.getElementById("tanggal_masuk").value = get_time();

    $(function() {
        function displayResult(item) {
            //console.log(item);
            $.ajax({
                type: "POST",
                url: '{$url}',
                //contentType: "application/json; charset=utf-8",
                //dataType: "json",
                data: {'id' : item.value},
                success: function(msg) {
                    //table_view(msg);
                    edit_view(msg)
                },
            });
        }
        $('#demo1').typeahead({
            ajax: {
                url: '{$url}',
                method: 'post',
                triggerLength: 1
            },
            onSelect: displayResult,
            displayField: 'nama_kapal',
        });
    });
JS;
//typeahead    
$this->registerJs($typeahead_script);
$this->registerJsFile(
    '@web/assets/typeahead/js/run_prettify.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/assets/typeahead/assets/js/jquery.mockjax.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/assets/typeahead/js/bootstrap-typeahead.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
//datatable
$this->registerJsFile(
    '@web/assets/datatable/js/jquery.dataTables.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/assets/datatable/js/dataTables.bootstrap.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/assets/datatable/resources/syntax/shCore.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerJsFile(
    '@web/assets/datatable/resources/demo.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => \yii\web\View::POS_HEAD]
);
$this->registerCssFile("@web/assets/datatable/css/dataTables.bootstrap.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    'media' => 'print',
], 'css-print-theme');

$ajax_data = Url::to('@web/assets/datatable/data/arrays.txt');
$form = ActiveForm::begin([
]);

?>
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
$('#example').DataTable( {
    "ajax": '<?=$ajax_data?>',
} );
} );

$(document).ready(function(){
   $('#submit_kapal').click(function(e){
        if ($('#id').val() == "") 
        {
            e.preventDefault();
            alert('Data tidak boleh kosong');
        }
    });
});
</script>
<script type="text/javascript">
    var tarif_pnbp = <?=json_encode($tarif)?>;
    var header_tarif = <?=json_encode($header_tarif)?>;

    function get_tarif(jenis_tarif) {
        var index = header_tarif.indexOf(jenis_tarif);
        var tarif = tarif_pnbp[index]['biaya'];
        return tarif;
    }

    var kapal_tambat = <?=json_encode($kapal_tambat)?>;
    var header_kapal = <?=json_encode($header_kapal)?>;
</script>
<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1" data-toggle="tab">Pendaftaran</a></li>
        <li><a href="#tab-2" data-toggle="tab">Invoice</a></li>
        <li><a href="#tab-3" data-toggle="tab">Kapal Tambat</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tab-1">
            <h3>Form Pendaftaran</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group">
                        <input id="demo1" type="text" class="form-control" placeholder="Cari kapal..." autocomplete="off">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <p id="status_kapal">Status:---</p>
                    </div>
                    <div class="col-md-2">
                        <?= Html::a('Input Kapal Baru', ['create'], ['class' => 'btn btn-warning ']) ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid panel panel-default">
                <h4 align="center">Rincian Data Kapal</h4>
                <form method="post" name="input" onsubmit="return alert("Please Fill All Required Field")">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID Kapal</label>
                            <input type="text" class="form-control" id="id" readonly="true" name="input_kapal[id]">
                        </div>
                        <div class="form-group">
                            <label>Nama Kapal</label>
                          <input type="text" class="form-control" id="nama_kapal" readonly="true">
                        </div>
                        <div class="form-group">
                            <label>Tanda Selar</label>
                            <input type="text" class="form-control" id="tanda_selar" readonly="true">
                        </div>
                        <div class="form-group">
                            <label>LOA</label>
                            <input type="text" class="form-control" id="loa" readonly="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="text" class="form-control" id="tanggal_masuk" name="input_kapal[tanggal_masuk]">
                        </div>
                        <div class="form-group">
                            <label>Perusahaan</label>
                          <input type="text" class="form-control" id="kode_perusahaan" readonly="true">
                        </div>
                        <div class="form-group">
                            <br>
                            <?= Html::button('Daftar', ['class' => 'btn btn-warning ', 'type' => 'submit', 'id' => 'submit_kapal']) ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane" id="tab-2">
            <h3>Daftar Invoice</h3>
            <div class="well col-md-4">
                <input id="demo2" type="text" class="col-md-12 form-control" placeholder="Search cities..." autocomplete="off" />
            </div>
            <div class="col-md-8">
                <pre class="prettyprint">
                </pre>
            </div>
        </div>
        <div class="tab-pane" id="tab-3">
            <h3>Daftar Kapal Tambat</h3>
            <div class="table-responsive">
            <?php
                $DataProvider = new ArrayDataProvider([
                    'allModels' => $hasil,
                    'pagination' => [
                        //'pageSize' => 10,
                        'defaultPageSize' => 10,
                    ],
                    'sort' => [
                        'attributes' => ['tanggal_masuk','nama_kapal','tanggal_keluar'],
                    ],
                ]);
            ?>
            <?= GridView::widget([
                        'dataProvider' => $DataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama_kapal',
                            'tanda_selar',
                            'tanggal_masuk',

                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{keluar} {lihat}',
                                'buttons' => [
                                    'keluar' => function($url, $model, $key) {     // render your custom button
                                        return Html::a('Keluar', ['kolam-pelabuhan/keluar','id'=>$model['id_kapal']], ['class' => 'btn btn-danger', 'target'=>"_blank"]);
                                    },
                                    'lihat' => function($url, $model, $key) {     // render your custom button
                                        return Html::a('Lihat', ['kolam-pelabuhan/view','id'=>$model['id_kapal']], ['class' => 'btn btn-warning', 'target'=>"_blank"]);
                                    }
                                ]
                            ],
                        ],
                    ]); 
            ?>
        </div>
            <div class="container-fluid">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div> 
<?php ActiveForm::end(); ?>
<script>
    
</script>