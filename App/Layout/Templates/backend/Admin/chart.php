<div class="grid simple">
    <div class="grid-title no-border">


            <h3 class="text-rose border-b">OVERVIEW
                <span class="pull-right ">
                    <i class="fa fa-eye text-green pull-right  m-r-10"></i>
                </span>
            </h3>


        <div class="row">

            <input type="hidden" value="<?php echo $this->data['publish'];?>" id="publish_count"/>
            <input type="hidden" value="<?php echo $this->data['unpublish'];?>" id="unpublish_count"/>
            <input type="hidden" value="<?php echo $this->data['countUsers'];?>" id="total_users"/>
            <input type="hidden" value="<?php echo $this->data['countUsersInactive'];?>" id="inactive_users"/>
            <input type="hidden" value="<?php echo $this->data['countUsersVal'];?>" id="activated_users"/>
            <input type="hidden" value="<?php echo $this->data['countUsersSigned'];?>" id="signed_users"/>

            <div id="month">
                <?php

                if($this->data_months)
                {
                    $d = $this->data_months;
                    /*$u=$this->data_unsubscribe_month;*/
                    foreach($d as $val)
                    {
                        $m[$val['mes']]=$val;
                    }
                    /*   foreach($u as $u_val)
                   {
                       $u_m[$u_val['mes']]=$u_val;
                   }*/

                $month = date('n');
                $y = date('Y');

                for($i=0;$i<=11; $i++)
                {
                    if(array_key_exists($month,$m))
                    {

                        $v=$m[$month]['count'];
                    }else{
                        $v=0;
                        $v_u=0;
                    }
                    /*
                                if(array_key_exists($month,$u_m))
                                {

                                    $v_u=$u_m[$month]['count'];
                                }else{
                                    $v_u=0;
                                }*/
                }



                    ?>
                    <input type="hidden"  id="<?php echo date('M', mktime(0, 0, 0, $month, 1, $y)) ?>" data-year="<?php echo $y?>" data-user="<?php echo $v ?>" data-unsubscribe="0"/>
                    <?php

                    if($month==1)
                    {
                        $month=12;
                        $y--;
                    }else{
                        $month--;
                    }
                }

                ?>
            </div>


            <div class="col-lg-2 col-sm-12 col-xs-12 text-center no-padding">
                <div class="panel" >
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-building"></i> Properties</h3>
                    </div>
                    <div class="panel-body">
                        <div id="properties" class="height-6" data-colors="#4dd2ff,#D35A91,#0aa89e"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3  col-sm-12 col-xs-12 text-center no-padding">
                <div class="panel" >
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users"></i> Members</h3>
                    </div>
                    <div class="panel-body">
                        <div id="agents_member_graph"  data-colors="#4dd2ff, #D35A91, #8056B3, #209ADC"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7  col-sm-12 col-xs-12 text-center no-padding">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users"></i> Member Activations</h3>
                    </div>
                    <div class="panel-body">
                        <div id="member-activity" ></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>