<!--html-->
    <!--body-->
        <!--div class="page"-->
            <!--div class="page-main"-->
                <!--div class="app-content main-content"-->
                    <!--div class="side-app"-->
                        <!--Page header-->
                        <style type="text/css">
                            @media (max-width: 820px) {
                                .hospital-invoice-number-title {
                                    text-align: center;
                                    /*display: inline;*/
                                }

                                .hospital-invoice-qr-title {
                                    text-align: center;
                                }

                                .hospital-invoice-number-title .h3 {
                                    font-size: 1rem;
                                }

                                .content {
                                  display: flex;
                                  flex-direction: row;
                                }

                                .left {
                                  display: flex;
                                  flex-direction: column;
                                  flex: 3;
                                }

                                .div-1 {
                                  flex: 3;
                                }

                                .div-3 {
                                  flex: 0.5;
                                }

                                .div-4 {
                                  flex: 1;
                                  text-align: center;
                                }

                                .right {
                                  display: flex;
                                  flex-direction: column;
                                  flex: 3;
                                }

                                .hospital-text-justify {
                                    text-align: center;
                                }
                            }

                            @media (min-width: 821px) {
                                .hospital-invoice-qr-title {
                                    /*text-align: right;*/
                                    display: flex;
                                    align-items: flex-end;
                                }
                            }
                        </style>
                        
                        <div class="row mt-5"></div>
                        <?php $dr = dir(getcwd()); ?>
                        <?php echo $dr->path; ?>
                        <button id="download">Download PDF</button>
                        <button id="sample">Download PDF Sample</button>
                        <div class="row" id="template_invoice">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row content">
                                            <!-- <span class="left"> -->
                                                <div class="col-md-6 div-1">
                                                    <div class="container mt-2 mb-2">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="media d-block d-sm-flex">
                                                                    <img src="public/assets/images/users/placeholder.jpg" alt="img" id="company_logo" class="avatar avatar-xl brround mr-3 align-self-center">
                                                                    <div class="media-body">
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->title ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->address ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->email ?></p>
                                                                        <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo $settings->phone ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6 col-sm-6">
                                                                <img src="public/assets/images/users/placeholder.jpg" alt="img">
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="h4 mb-0"><?php echo $settings->title ?></label>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </span> -->
                                            <!-- <span class="right"> -->
                                                <div class="col-md-6 div-3">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                                            <div class="container mt-2 mb-2">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="media d-block d-sm-flex">
                                                                            <div class="media-body hospital-invoice-number-title">
                                                                                <p class="h3 mg-b-5 mb-0 tx-inverse tx-15"><?php echo lang('hospital').' '.lang('invoice'); ?></p>
                                                                                <p class="mg-b-5 mb-0 tx-inverse tx-15"><?php echo lang('invoice').' # '.$payment->invoice_number;?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-lg-6">
                                                            <div class="container mt-2 mb-2">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="media d-block d-sm-flex">
                                                                            <div class="media-body hospital-invoice-qr-title">
                                                                                <img src="https://www.researchgate.net/profile/Alexander-Rassau/publication/224204651/figure/fig1/AS:302711959506947@1449183563237/An-example-of-QR-code.png" id="qr_logo">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md col-sm col-lg div-4">
                                                    
                                                </div> -->
                                            <!-- </span> -->
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="form-label">Billed to</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('patient').' '.lang('name').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->name;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('patient').' '.lang('id').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->patient_id;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('age').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $age;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <span><label class="font-weight-bold"><?php echo lang('address').' :'; ?>&nbsp</label><?php
                                                            if (!empty($patient)) {
                                                                echo $patient->address;
                                                            }
                                                        ?></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered w-100" id="editable-sample">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Description</th>
                                                                    <th>Rate</th>
                                                                    <th>Qty</th>
                                                                    <th>Line Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description1</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description2</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description3</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11-03-2022</td>
                                                                    <td>Description4</td>
                                                                    <td>27000</td>
                                                                    <td>1</td>
                                                                    <td>27000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- end app-content-->
            </div>

            <!--Footer-->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                            Copyright © 2021 <a href="#">Rygel Dash</a>. Deployed by <a href="#">Rygel Technology Solutions</a> All rights reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top" class="d-print-none">
            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
        </a>

        <!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>

        <!-- Bootstrap4 js-->
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo base_url('public/assets/plugins/othercharts/jquery.sparkline.min.js'); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo base_url('public/assets/js/vendors/circle-progress.min.js'); ?>"></script>

        <!-- Jquery-rating js-->
        <script src="<?php echo base_url('public/assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo base_url('public/assets/plugins/sidemenu/sidemenu.js'); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scrollbar.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/p-scrollbar/p-scroll1.js'); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

        <!--Page specific declarations here. Transferred from head to here-->
        

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.5.22/dist/jspdf.plugin.autotable.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script> -->
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <script src="<?php echo base_url('public/assets/plugins/signature/signature_plugin.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/assets/plugins/jspdf/faker.min.js'); ?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                console.log(window.faker);
            })
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#download").click(function() {
                    var invoice_id = '<?php echo $payment->id; ?>';
                    $.ajax({
                        url: 'finance/getInvoiceDetailsByInvoiceId?id='+invoice_id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                        success: function (response) {
                            var settings = response.settings;
                            var item_list = response.item_list;
                            // var imgData = 'data:image/jpeg;base64,'+ btoa('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRjC5MfUm-lXtmuwDmHDoUCK9WKrYXHt-e33-ozzTrbA&s');
                            // console.log(document.getElementsByClassName("profile_image"));
                            // console.log(document.getElementById("profile_image"))

                            // var d = String("");

                            console.log(JSON.stringify(item_list));

                            var img = document.getElementById("company_logo");

                                                var doc = new jsPDF('p', 'mm', [297, 210]),
                                                margins = {
                                                  top: 40,
                                                  bottom: 60,
                                                  left: 40,
                                                  width: 822
                                                };

                                                var splitTitle = doc.splitTextToSize('zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzv', 50);

                                                var table1 = 
                                                    tableToJson($('#editable-sample').get(0)),
                                                    cellWidth = 35,
                                                    dateCellWidth = 25,
                                                    descriptionCellWidth = 49,
                                                    rateCellWidth = 47,
                                                    qtyCellWidth = 32,
                                                    lineTotalCellWidth = 31,
                                                    rowCount = 0,
                                                    cellContent,
                                                    leftMargin = 13,
                                                    topMargin = 98,
                                                    topMarginTable = 55,
                                                    headerRowHeight = 13,
                                                    rowHeight = 13,

                                                    l = {
                                                        orientation: 'p',
                                                        unit: 'mm',
                                                        format: 'a3',
                                                        compress: true,
                                                        fontSize: 8,
                                                        lineHeight: 1,
                                                        autoSize: false,
                                                        printHeaders: true
                                                    };

                                                // console.log(tableToJson($('#editable-sample').get(0)));

                                                // doc.cellInitialize();

                                                // var doc = new jsPDF({
                                                //   orientation: 'portrait',
                                                //   unit: 'mm',
                                                //   format: [297, 210]
                                                // }),margins = {
                                                //   top: 40,
                                                //   bottom: 60,
                                                //   left: 40,
                                                //   width: 822
                                                // };

                                                // doc.addImage(img, 'jpg', 15, 40, 180, 160);
                                                
                                                // doc.setLineWidth(90);

                                                // doc.setFontSize(12);
                                                // doc.addImage(img, 'jpg', 13, 15, 20, 20);
                                                // doc.text('CEBU MEDICAL DEMO', 25, 17);
                                                // // doc.text('HOSPITAL INVOICE', 90, 17, {align: 'center'});
                                                // doc.text('Cebu Demo Clinic R1', 158, 17, {
                                                //     align: 'justify',
                                                //     maxWidth: 20,
                                                // });


                                                /*Header*/
                                                    doc.setFontSize(12);
                                                    doc.addImage(img, 'jpg', 13, 13, 20, 20);

                                                    /*Hospital Information*/
                                                    doc.text('CEBU MEDICAL DEMO', 35, 17);
                                                    doc.text('HVG IT Park Cebu City, Cebu 6014', 35, 22);
                                                    doc.text('CebuMedicaldemo@gmail.com', 35, 27);
                                                    doc.text('+639166669532', 35, 32);

                                                    /*Invoice Information*/
                                                    doc.text('HOSPITAL INVOICE', 116, 17, {align: 'center'});
                                                    doc.setFontSize(10);
                                                    doc.text('Invoice # 203949', 116, 21, {align: 'center'});

                                                    doc.addImage(img, 'jpg', 176, 13, 18, 18);
                                                    doc.setFontSize(8);
                                                    doc.text(doc.splitTextToSize('Online View', 23), 177, 35);

                                                    /*Bill Info Start*/
                                                        doc.setFontSize(10);
                                                        doc.setFontStyle('bold');
                                                        doc.setTextColor('#6c757d');
                                                        doc.text('Billed To', 13, 56);
                                                        doc.setTextColor('#000000');
                                                        doc.setFontStyle('normal');

                                                        var texts1 = [
                                                            'Patient Name :','Shin Chan',
                                                            'Patient ID :','23',
                                                            'Age :','29',
                                                            'Address :','HVG IT Park Mandaue City Cebu',
                                                            'Contact :','+639332494320',

                                                            'Facility ID :','9',
                                                            'Doctor :','Dr.Rey Balondoy',
                                                            'Payer Account :','23-Personal',
                                                            'Date Issue :','11-04-2022',
                                                            'Due Date :','12-04-2022',
                                                        ];
                                                        var coordinates1 = [
                                                            [13,61],[39,61],
                                                            [13,66],[32,66],
                                                            [13,71],[23,71],
                                                            [13,76],[30,76],
                                                            [13,81],[29,81],

                                                            [89,61],[109,61],
                                                            [89,66],[104,66],
                                                            [89,71],[117,71],
                                                            [89,76],[110,76],
                                                            [89,81],[108,81],
                                                        ];
                                                        var style = [
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],

                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                            ['bold'],['normal'],
                                                        ];

                                                        texts1.forEach(function(text, index) {
                                                            doc.setFontStyle(style[index]);
                                                            doc.text(text, coordinates1[index][0], coordinates1[index][1]);
                                                        })

                                                        doc.setFontSize(12);
                                                        doc.text('Amount Due (PHP)', 158, 73);
                                                        doc.setFontSize(18);
                                                        console.log(doc.getFontList())
                                                        doc.text(doc.splitTextToSize('33,124.50', 41), 158, 81);
                                                    /*Bill Info End*/

                                                /*Header*/

                                                /*Table*/
                                                    // $.each(item_list, function (i, row)
                                                    // {

                                                    //     rowCount++;

                                                    //     $.each(row, function (j, cellContent) {

                                                    //         if (j == "date") {
                                                    //             cellWidth = dateCellWidth;
                                                    //         } else if (j == "description") {
                                                    //             cellWidth = descriptionCellWidth;
                                                    //         } else if (j == "rate") {
                                                    //             cellWidth = rateCellWidth;
                                                    //         } else if (j == "qty") {
                                                    //             cellWidth = qtyCellWidth;
                                                    //         } else if (j == "linetotal") {
                                                    //             cellWidth = lineTotalCellWidth;
                                                    //         }

                                                    //         if (rowCount == 1) {
                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");

                                                    //             doc.cell(leftMargin, topMargin, cellWidth, headerRowHeight, cellContent, i)
                                                    //         }
                                                    //         else if (rowCount == 2) {
                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");                  

                                                    //             doc.cell(leftMargin, topMargin, cellWidth, rowHeight, cellContent, i); 
                                                    //         }
                                                    //         else {

                                                    //             doc.margins = 1;
                                                    //             doc.setFontSize(8);                    
                                                    //             doc.setFont("courier ");
                                                    //             doc.setFontType("bolditalic ");
                                                    //             doc.cell(leftMargin, topMargin, cellWidth, rowHeight, cellContent, i);  // 1st=left margin    2nd parameter=top margin,     3rd=row cell width      4th=Row height
                                                    //         }
                                                    //     })
                                                    // })

                                                /*Table*/

                            // doc.text('Hi How are you', 105, 15, 'center');

                                                // let header = ["date","description","rate","qty","linetotal"];

                                                // let headerConfig = header.map(key=>({ 
                                                //   'name': key,
                                                //   'prompt': key,
                                                //   'width':50,
                                                //   'align':'center',
                                                //   'padding':0
                                                // }));

                                                // doc.table(13, 198, item_list, headerConfig)

                                            /*AutoTable JSPDF Theme*/

                                                // console.log(item_list);

                                                var output = item_list.map(function(obj) {
                                                  return Object.keys(obj).sort().map(function(key) { 
                                                    return obj[key];
                                                  });
                                                });

                                                // console.log(output);

                                                doc.autoTable({
                                                    theme: 'grid',//striped Default
                                                    headStyles: { 
                                                        // lineWidth: 1, lineColor: [255, 0, 0],
                                                        lineWidth: 0.3,
                                                        lineColor: [226, 226, 226],
                                                        halign: 'center',
                                                        fillColor: [255, 255, 255],
                                                        textColor: '#000000',
                                                    },
                                                    // alternateRowStyles: {
                                                    //     fontStyle: 'bold',
                                                    // },
                                                    columnStyles: {
                                                        0: { valign: 'middle', halign: 'center', cellWidth: 25 },
                                                        1: { valign: 'middle', halign: 'left', cellWidth: 94 },
                                                        2: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        3: { valign: 'middle', halign: 'center', cellWidth: 13 },
                                                        4: { valign: 'middle', halign: 'right', cellWidth: 26 }
                                                    },
                                                    margin: { left: 13, right: 13, top: 13, bottom: 37 },
                                                    head: [["Date","Description","Rate","Qty","Line Total"]],
                                                    body: output,
                                                    // body: [
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                        // ['David', 'david@example.com', 'Sweden'],
                                                        // ['Castille', 'castille@example.com', 'Spain'],
                                                    // ],
                                                    startY: 98,
                                                    // showHead: 'everyPage',
                                                    // showFoot: 'everyPage',
                                                    pageBreak: 'auto',
                                                    didParseCell: function (Data) {
                                                        // if (HookData.cell == undefined) {
                                                        //     return;
                                                        // }
                                                        // console.log(Data);
                                                        
                                                        if (Data.section === 'body' && Data.column.index === 1) {
                                                        }
                                                    }
                                                })

                                                doc.autoTable({
                                                    theme: 'plain',//striped Default
                                                    headStyles: { 
                                                        // lineWidth: 1, lineColor: [255, 0, 0],
                                                        // lineWidth: 0.3,
                                                        // lineColor: [226, 226, 226],
                                                        // halign: 'center',
                                                        // fillColor: [255, 255, 255],
                                                        // textColor: '#000000',
                                                    },
                                                    // alternateRowStyles: {
                                                    //     fontStyle: 'bold',
                                                    // },
                                                    columnStyles: {
                                                        0: { valign: 'middle', halign: 'left', cellWidth: 80 },
                                                        1: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        2: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        3: { valign: 'middle', halign: 'right', cellWidth: 26 },
                                                        4: { valign: 'middle', halign: 'right', cellWidth: 26 }
                                                    },
                                                    margin: { left: 13, right: 13, bottom: 37 },
                                                    head: [[ { content: "Insurance", styles: { fontSize: 12 } } ,"","","",""],["Philhealth Claims","Deductions","Denied","Payment","Under (Over) Payment"]],
                                                    body: [
                                                        ['A. First Case Rate (HB)', '6,500.00', '0.00', '0.00', '6,500.00'],
                                                        ['B. Total PF Portion', '1,500.00', '0.00', '0.00', '1,500.00'],
                                                        ['TOTAL PHIC BENEFITS', '8,000.00', '0.00', '0.00', '8,000.00'],
                                                    ],
                                                    startY: doc.lastAutoTable.finalY + 14,
                                                    // showHead: 'everyPage',
                                                    // showFoot: 'everyPage',
                                                    pageBreak: 'avoid',
                                                    didParseCell: function (Data) {
                                                        var rows = Data.table.body;
                                                        // if (HookData.cell == undefined) {
                                                        //     return;
                                                        // }
                                                        // console.log(Data);
                                                        
                                                        if (Data.section === 'head' && Data.column.index != 0) {
                                                            Data.cell.styles.halign = 'right';
                                                        }
                                                        if (Data.section === 'body') {
                                                            if (Data.row.index === rows.length - 1) {
                                                                Data.cell.styles.fontStyle = 'bold';
                                                                if (Data.column.index === 0) {
                                                                    Data.cell.styles.halign = 'left';
                                                                }
                                                            }
                                                        }
                                                    },
                                                })

                                                doc.addPage('a4', 'p');

                                                doc.autoTable({
                                                    theme: 'plain',
                                                    columnStyles: {
                                                        0: { cellWidth: 52 },
                                                        1: { halign: 'left', cellWidth: 100 },
                                                        2: { halign: 'right', cellWidth: 32 }
                                                    },
                                                    margin: { left: 13, right: 13, bottom: 37 },
                                                    head: [["", "", ""]],
                                                    body: [
                                                        ['', 'Subtotal', '56,818.50'],
                                                        ['', 'VAT 13%', '8,807.12'],
                                                        ['', 'Total', '72,248.50'],
                                                        ['', 'Adjustment', '0.00'],
                                                        ['', 'Inssurance', '8,000.00'],
                                                        ['', 'Discount', '500.00'],
                                                        ['', 'Amount Paid', '0.00'],
                                                        ['', 'Amount Due (PHP)', '64,248.50'],
                                                        ['', '', ''],
                                                        [ { content: '', colSpan: 3 } ]
                                                        // ['Signature over Printed Name of Member / Patient / Autorized Person', '', 'Signature over Printed Name of Billing Clerk'],
                                                    ],
                                                    pageBreak: 'avoid',
                                                    // startY: doc.lastAutoTable.finalY,
                                                    startY: 13,
                                                    didParseCell: function (Data) {
                                                        var rows = Data.table.body;

                                                        if (Data.section === 'body') {
                                                            Data.cell.styles.cellPadding = 1;
                                                        }

                                                        if (Data.row.index === rows.length - 3) {
                                                            Data.cell.styles.cellPadding = { bottom: 1, left: 1, right: 1, top: Data.cell.y };
                                                            Data.cell.styles.fontStyle = 'bold';
                                                            Data.cell.styles.fontSize = 13;
                                                            if (Data.column.index === 2) {
                                                                Data.cell.styles.halign = 'right';
                                                            }
                                                        }

                                                        // if (Data.row.index === rows.length - 1) {
                                                        //     Data.cell.styles.
                                                        // }

                                                        if (Data.row.index === rows.length - 1) {
                                                            Data.cell.styles.cellPadding = { bottom: 1, left: 1, right: 1, top: Data.cell.y };
                                                            if (Data.column.index === 2) {
                                                                Data.cell.styles.halign = 'center';
                                                            }
                                                        }

                                                        if (Data.row.index === rows.length - 2) {
                                                            Data.cell.styles.cellPadding = { bottom: 1, left: 1, right: 1, top: Data.cell.y + 60 };
                                                        }

                                                        console.log(Data);
                                                        console.log(Data.table);
                                                    },
                                                    didDrawCell: function (Data) {
                                                        var rows = Data.table.body;

                                                        if (Data.row.index === 1 || Data.row.index === rows.length - 4) {
                                                            console.log(Number(Data.cell.y + Data.cell.height));

                                                            Data.cell.styles.cellPadding = { bottom: 5, left: 1, right: 1, top: 1 };
                                                            doc.setDrawColor(0, 0, 0);
                                                            doc.line(60, Data.cell.y + Data.cell.height, 197, Data.cell.y + Data.cell.height);
                                                        }

                                                        if (Data.row.index === rows.length - 1) {
                                                            if (Data.column.index === 0) {
                                                                doc.autoTable({
                                                                    theme: 'plain',
                                                                    columnStyles: {
                                                                        0: { halign: 'left', cellWidth: 92 },
                                                                        1: { halign: 'right', cellWidth: 92, },
                                                                    },
                                                                    margin: { left: 13, right: 13, bottom: 37},
                                                                    head: [["", ""]],
                                                                    body: [
                                                                        ['Signature over Printed Name of Member / Patient / Autorized Person', 'Signature over Printed Name of Billing Clerk'],
                                                                        [ { content: 'Notes', styles: { fontSize: 12, textColor: '#6c757d' } }, '' ],
                                                                        [ { content: '*Enter notes or Bank ID for the transaction.', styles: { fontSize: 12, textColor: '#000000' } } ],
                                                                        [ { content: 'Terms', styles: { fontSize: 12, textColor: '#6c757d' } } ],
                                                                        [ { content: '*Payment is expected to be done within 30 days', styles: { fontSize: 12, textColor: '#000000' } } ],
                                                                    ],
                                                                    startY: Data.cell.y,
                                                                    rowPageBreak: 'avoid',
                                                                    didParseCell: function (innerData) {
                                                                        var rows = innerData.table.body;
                                                                        if (innerData.row.index === rows.length - 4) {
                                                                            innerData.cell.styles.cellPadding = { bottom: 1, left: 1, right: 1, top: innerData.cell.y + 40 };
                                                                        }

                                                                        if (innerData.row.index === rows.length - 3 || innerData.row.index === rows.length - 2 || innerData.row.index === rows.length - 1) {
                                                                            innerData.cell.styles.cellPadding = { bottom: 1, left: 1, right: 1, top: 1 };
                                                                        }
                                                                    },
                                                                    didDrawCell: function (innerData) {
                                                                        var rows = innerData.table.body;

                                                                        console.log(Data.cell.y + 80)
                                                                        console.log(rows)
                                                                        console.log(rows.length - 2)
                                                                        if (innerData.row.index === rows.length - 5 && innerData.row.section === 'body') {
                                                                            doc.setDrawColor(0, 0, 0);
                                                                            doc.line(14, innerData.cell.y, 94, innerData.cell.y);
                                                                            doc.line(125, innerData.cell.y, 197, innerData.cell.y);
                                                                        }
                                                                    }
                                                                })
                                                            }
                                                        }

                                                    }
                                                })

                                                /*Samples*/
                                                    // doc.autoTable({
                                                    //     theme: 'plain',
                                                    //     columnStyles: {
                                                    //         0: { cellWidth: 46 },
                                                    //         1: { halign: 'left', cellWidth: 112 },
                                                    //         2: { halign: 'right', cellWidth: 26 }
                                                    //     },
                                                    //     margin: { left: 13, right: 13, bottom: 37 },
                                                    //     head: [["", "", ""]],
                                                    //     body: [
                                                    //         ['', 'Subtotal', '56,818.50'],
                                                    //         ['', 'VAT 13%', '8,807.12'],
                                                    //     ],
                                                    //     startY: doc.lastAutoTable.finalY,
                                                    //     didParseCell: function (Data) {
                                                    //         var rows = Data.table.body;

                                                    //         console.log(Data);
                                                    //     }
                                                    // })

                                                    // doc.setDrawColor(0, 0, 0);
                                                    // doc.line(60, doc.lastAutoTable.finalY + 3, 197, doc.lastAutoTable.finalY + 3);

                                                    // doc.autoTable({
                                                    //     theme: 'plain',
                                                    //     styles: {
                                                    //         font: 'arial'|'times'
                                                    //     },
                                                    //     columnStyles: {
                                                    //         0: { cellWidth: 46 },
                                                    //         1: { halign: 'left', cellWidth: 112 },
                                                    //         2: { halign: 'right', cellWidth: 26 }
                                                    //     },
                                                    //     margin: { left: 13, right: 13, bottom: 37 },
                                                    //     head: [["", "", ""]],
                                                    //     body: [
                                                    //         ['', 'Total', '72,248.50'],
                                                    //         ['', 'Adjustment', '0.00'],
                                                    //         ['', 'Inssurance', '8,000.00'],
                                                    //         ['', 'Discount', '500.00'],
                                                    //         ['', 'Amount Paid', '0.00'],
                                                    //     ],
                                                    //     startY: doc.lastAutoTable.finalY - 3,
                                                    // })

                                                    // doc.setDrawColor(0, 0, 0);
                                                    // doc.line(60, doc.lastAutoTable.finalY + 3, 197, doc.lastAutoTable.finalY + 3);

                                                    // doc.autoTable({
                                                    //     theme: 'plain',
                                                    //     styles: {
                                                    //         font: 'arial'|'times'
                                                    //     },
                                                    //     columnStyles: {
                                                    //         0: { cellWidth: 46 },
                                                    //         1: { halign: 'left', cellWidth: 112 },
                                                    //         2: { halign: 'right', cellWidth: 26 }
                                                    //     },
                                                    //     margin: { left: 13, right: 13, bottom: 37 },
                                                    //     head: [["", "", ""]],
                                                    //     body: [
                                                    //         ['', 'Amount Due (PHP)', '64,248.50'],
                                                    //     ],
                                                    //     startY: doc.lastAutoTable.finalY - 3,
                                                    // })
                                                /*Samples*/

                                                // console.log(doc.lastAutoTable);
            
                                                doc.addPage('a4', 'p');

                                            /*AutoTable JSPDF Theme*/

                                                doc.save('my-pdf.pdf');

                                                function tableToJson(table) {
                                                var data = [];

                                                // first row needs to be headers
                                                var headers = [];
                                                for (var i=0; i<table.rows[0].cells.length; i++) {
                                                    headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
                                                }

                                                // go through cells
                                                for (var i=1; i<table.rows.length; i++) {

                                                    var tableRow = table.rows[i];
                                                    var rowData = {};

                                                    for (var j=0; j<tableRow.cells.length; j++) {

                                                        rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

                                                    }

                                                    data.push(rowData);
                                                }       

                                                return data; }

                            // var pdf = new jsPDF('p','in','letter')
                            // , sizes = [12]
                            // , fonts = [['Times','Roman'],['Helvetica',''], ['Times','Italic']]
                            // , font, size, lines
                            // , verticalOffset = 0.5 // inches on a 8.5 x 11 inch sheet.
                            // , loremipsum = 'Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...Lorem ipsum dolor sit amet, ...'

                            // for (var i in fonts){
                            //     if (fonts.hasOwnProperty(i)) {
                            //         font = fonts[i]
                            //         size = sizes[i]

                            //         lines = pdf.setFont(font[0], font[1])
                            //                     .setFontSize(size)
                            //                     .splitTextToSize(loremipsum, 7.5)
                            //         // Don't want to preset font, size to calculate the lines?
                            //         // .splitTextToSize(text, maxsize, options)
                            //         // allows you to pass an object with any of the following:
                            //         // {
                            //         //  'fontSize': 12
                            //         //  , 'fontStyle': 'Italic'
                            //         //  , 'fontName': 'Times'
                            //         // }
                            //         // Without these, .splitTextToSize will use current / default
                            //         // font Family, Style, Size.

                            //         pdf.text(0.5, verticalOffset + size / 72, lines)

                            //         verticalOffset += (lines.length + 0.5) * size / 72
                            //     }
                            // }

                            // pdf.save('Test.pdf');
                        }
                    })
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#sample").click(function() {
                    var doc = new jsPDF()
                      var totalPagesExp = '{total_pages_count_string}'

                      doc.autoTable({
                        head: headRows(),
                        body: bodyRows(80),
                        didDrawPage: function (data) {
                          // Header
                          doc.setFontSize(20)
                          doc.setTextColor(40)
                          doc.addImage('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAApgAAAKYB3X3/OAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANCSURBVEiJtZZPbBtFFMZ/M7ubXdtdb1xSFyeilBapySVU8h8OoFaooFSqiihIVIpQBKci6KEg9Q6H9kovIHoCIVQJJCKE1ENFjnAgcaSGC6rEnxBwA04Tx43t2FnvDAfjkNibxgHxnWb2e/u992bee7tCa00YFsffekFY+nUzFtjW0LrvjRXrCDIAaPLlW0nHL0SsZtVoaF98mLrx3pdhOqLtYPHChahZcYYO7KvPFxvRl5XPp1sN3adWiD1ZAqD6XYK1b/dvE5IWryTt2udLFedwc1+9kLp+vbbpoDh+6TklxBeAi9TL0taeWpdmZzQDry0AcO+jQ12RyohqqoYoo8RDwJrU+qXkjWtfi8Xxt58BdQuwQs9qC/afLwCw8tnQbqYAPsgxE1S6F3EAIXux2oQFKm0ihMsOF71dHYx+f3NND68ghCu1YIoePPQN1pGRABkJ6Bus96CutRZMydTl+TvuiRW1m3n0eDl0vRPcEysqdXn+jsQPsrHMquGeXEaY4Yk4wxWcY5V/9scqOMOVUFthatyTy8QyqwZ+kDURKoMWxNKr2EeqVKcTNOajqKoBgOE28U4tdQl5p5bwCw7BWquaZSzAPlwjlithJtp3pTImSqQRrb2Z8PHGigD4RZuNX6JYj6wj7O4TFLbCO/Mn/m8R+h6rYSUb3ekokRY6f/YukArN979jcW+V/S8g0eT/N3VN3kTqWbQ428m9/8k0P/1aIhF36PccEl6EhOcAUCrXKZXXWS3XKd2vc/TRBG9O5ELC17MmWubD2nKhUKZa26Ba2+D3P+4/MNCFwg59oWVeYhkzgN/JDR8deKBoD7Y+ljEjGZ0sosXVTvbc6RHirr2reNy1OXd6pJsQ+gqjk8VWFYmHrwBzW/n+uMPFiRwHB2I7ih8ciHFxIkd/3Omk5tCDV1t+2nNu5sxxpDFNx+huNhVT3/zMDz8usXC3ddaHBj1GHj/As08fwTS7Kt1HBTmyN29vdwAw+/wbwLVOJ3uAD1wi/dUH7Qei66PfyuRj4Ik9is+hglfbkbfR3cnZm7chlUWLdwmprtCohX4HUtlOcQjLYCu+fzGJH2QRKvP3UNz8bWk1qMxjGTOMThZ3kvgLI5AzFfo379UAAAAASUVORK5CYII=', 'JPEG', data.settings.margin.left, 15, 10, 10)
                          doc.text('Report', data.settings.margin.left + 15, 22)

                          // Footer
                          var str = 'Page ' + doc.internal.getNumberOfPages()
                          // Total page number plugin only available in jspdf v1.0+
                          if (typeof doc.putTotalPages === 'function') {
                            str = str + ' of ' + totalPagesExp
                          }
                          doc.setFontSize(10)

                          // jsPDF 1.4+ uses getWidth, <1.4 uses .width
                          var pageSize = doc.internal.pageSize
                          var pageHeight = pageSize.height ? pageSize.height : pageSize.getHeight()
                          doc.text(str, data.settings.margin.left, pageHeight - 10)
                        },
                        margin: { top: 30 },
                      })

                      // Total page number plugin only available in jspdf v1.0+
                      if (typeof doc.putTotalPages === 'function') {
                        doc.putTotalPages(totalPagesExp)
                      }

                      doc.save('my-pdf.pdf');
                })
            })
        </script>

        <script type="text/javascript">
            function headRows() {
              return [
                { id: 'ID', name: 'Name', email: 'Email', city: 'City', expenses: 'Sum' },
              ]
            }

            function footRows() {
              return [
                { id: 'ID', name: 'Name', email: 'Email', city: 'City', expenses: 'Sum' },
              ]
            }

            function columns() {
              return [
                { header: 'ID', dataKey: 'id' },
                { header: 'Name', dataKey: 'name' },
                { header: 'Email', dataKey: 'email' },
                { header: 'City', dataKey: 'city' },
                { header: 'Exp', dataKey: 'expenses' },
              ]
            }

            function data(rowCount) {
              rowCount = rowCount || 10
              var body = []
              for (var j = 1; j <= rowCount; j++) {
                body.push({
                  id: j,
                  name: faker.name.findName(),
                  email: faker.internet.email(),
                  city: faker.address.city(),
                  expenses: faker.finance.amount(),
                })
              }
              return body
            }

            function bodyRows(rowCount) {
              rowCount = rowCount || 10
              var body = []
              for (var j = 1; j <= rowCount; j++) {
                body.push({
                  id: j,
                  name: faker.name.findName(),
                  email: faker.internet.email(),
                  city: faker.address.city(),
                  expenses: faker.finance.amount(),
                })
              }
              return body
            }
        </script>

    </body>
</html>         
<!--OLD Starts Here-->
