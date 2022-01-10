<?
/*
# TransferStatus
$StatusDescription = array(
    '1' =>    'New',
    '2' =>    'Confirmed',
    '3' =>    'Canceled',
    '4' =>    'Refunded',
    '5' =>    'No-Show',
    '6' =>    'DriverError',
    '7' =>    'Completed',
    '8' =>    'Comm.Paid'
);
*/
    require_once '../db/v4_OrderDetails.class.php';

    $od = new v4_OrderDetails();



    $where = ' WHERE UserID = '.$_SESSION["AuthUserID"].' AND PickupDate >= "'.date("Y-m-d").'" AND TransferStatus < "3"';
    $k = $od->getKeysBy('DetailsID', 'asc', $where);
    $activeOrders = count($k);


    $where = ' WHERE UserID = '.$_SESSION["AuthUserID"].' AND PickupDate >= "'.date("Y-m-d").'" AND TransferStatus < "3" AND (DriverConfStatus = "2" OR DriverConfStatus = "3")';
    $k = $od->getKeysBy('DetailsID', 'asc', $where);
    $confirmedOrders = count($k);


    $where = ' WHERE UserID = '.$_SESSION["AuthUserID"].' AND PickupDate >= "'.date("Y-m-d").'" AND TransferStatus < "3" AND DriverConfStatus = "1"';
    $k = $od->getKeysBy('DetailsID', 'asc', $where);
    $notConfirmedOrders = count($k);

    $where = ' WHERE UserID = '.$_SESSION["AuthUserID"].' AND PickupDate >= "'.date("Y-m-d").'" AND TransferStatus < "3" AND DriverConfStatus = "4"';
    $k = $od->getKeysBy('DetailsID', 'asc', $where);
    $declined = count($k);

    $od->endv4_OrderDetails();

?>    

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="index.php?p=transfersList&transfersFilter=active">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            <?= $activeOrders ?>
                                        </h3>
                                        <p>
                                            <?= ACTIVE ?>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-plane"></i>
                                    </div>
                                    
                                        <span  class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </span>
                                    
                                </div>
                            </a>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="index.php?p=transfersList&transfersFilter=confirmed">
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>
                                            <?= $confirmedOrders ?>
                                        </h3>
                                        <p>
                                            <?= CONFIRMED ?>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-android-checkmark"></i>
                                    </div>
                                     <span class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                </div>
                            </a>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="index.php?p=transfersList&transfersFilter=notConfirmed">
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>
                                            <?= $notConfirmedOrders ?>
                                        </h3>
                                        <p>
                                            <?= NOT_CONFIRMED ?>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios7-alarm"></i>
                                    </div>
                                     <span class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                </div>
                            </a>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="index.php?p=transfersList&transfersFilter=declined">
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>
                                            <?= $declined ?>
                                        </h3>
                                        <p>
                                            <?= DECLINED ?>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-nuclear"></i>
                                    </div>
                                     <span class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                    </span>
                                </div>
                            </a>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
