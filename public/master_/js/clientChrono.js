class clientChrono
{

	constructor (id)
	{
		this.state=false;
		this.id=id.substr(2);
		this.target=$('#'+id);
		this.targetTime=clientChrono.timetosec(this.target.data('rest'));
		this.time=this.targetTime;
		/*new Date();//+this.target.data('rest')*1000;
		var tm=clientChrono.TimeTrimer(this.target.data('rest')*1000);
		this.targetTime.setHours(this.targetTime.getHours()+tm.hour);
		this.targetTime.setMinutes(this.targetTime.getMinutes()+tm.min);
		this.targetTime.setSeconds(this.targetTime.getSeconds()+tm.sec);
		this.actualise=0;
 		this.begin= new Date();
 		this.DEFAULTS = {
			backgroundColor: '#b3cef6',
			progressColor: '#4b86db',
			percent: 75,
			duration: 0,
			hour:0,
			min:30,
			sec:15
		};*/
		var tm=clientChrono.TimeTrimer(this.time*1000);
		this.backgroundColor= '#b3cef6';
		this.progressColor= '#4b86db';
		this.percent= 0.1;
		this.duration= 0;
		this.hour=tm.hour;
		this.min=tm.min;
		this.sec=tm.sec;	
		this.opts = {
			backgroundColor: this.target.data('color') ? this.target.data('color').split(',')[0] : this.DEFAULTS.backgroundColor,
			progressColor: this.target.data('color') ? this.target.data('color').split(',')[1] : this.DEFAULTS.progressColor,
			percent: this.percent
			
			//duration: this.target.data('duration') ? this.target.data('duration') : this.DEFAULTS.duration
			};
			this.target.append('<div class="background"></div><div class="rotate"></div><div class="left"></div><div class="right"></div><div class=""><span class="decvalue">' + this.hour+':'+this.min+':'+this.sec + '</span></div>');
	this.decvalue='0:0:0';
	this.value_to_dec=10;//((this.target*5/60)<10) ? (this.target*5/60):2;
    //alert(this.value_to_dec);
    this.topronounce=$('#'+this.id).children('td').eq(0).text()+' a fini son temps';
    this.enonciation= new SpeechSynthesisUtterance(this.topronounce);
	}
    enonce()
    {
        window.speechSynthesis.speak(this.enonciation);
    }
	static sectotime(sec)
	{
		var time=clientChrono.TimeTrimer(sec);
		return time.hour+':'+time.min+':'+time.sec;
	}
	static timetosec(time)
	{
		time=time.split(':');
		return Math.floor(time[0]*3600)+Math.floor(time[1]*60)+Math.floor(time[2]);
	}
	
	
	init()
	{
        // Récupération des références vers les éléments pour l'affichage
        // La référence n'est récupérée qu'une seule fois à l'initialisation pour optimiser les performances
        var state=(this.state)? 'true':'false';

        $.ajax(
    		{
    			url:'ControllerSession',
    			data: "id="+this.id+"&action=true&state="+state,
    			type:'get',
    			dataType:'html',
    			success:function(code,etat)
    			{
    				
    				//alert(code);
    			},
    			error:function(code,etat,error)
    			{
    				alert(error);
    			}
    		});
        this.loading(); // Premier tick tout de suite
        
    }
    pause()
    {
    	this.state=false;
    	clearInterval(clientChronom[this.id].actualise);
    	$('#chronos_'+this.id).removeAttr('disabled'); $('#chronop_'+this.id).attr('disabled','disabled');
    }
    start()
    {
		this.resume();
    }
    update()
    {
    	$.ajax(
    		{
    			url:'Session',
    			data: "id="+this.id+"&val="+this.value_to_dec,
    			type:'get',
    			dataType:'html',
    			success:function(code,etat)
    			{
    				
    				//alert(code);
    			},
    			error:function(code,etat,error)
    			{
    				alert(error);
    			}
    		});

    }
    resume()
    {
        this.state=true;
        var state=(this.state)? 'true':'false';
            //alert(this.state);
        $.ajax(
            {
                url:'ControllerSessionMaj',
                data: "id="+this.id+"&action=true&state="+state,
                type:'get',
                dataType:'html',
                success:function(code,etat)
                {
                    
                    //alert(code);
                },
                error:function(code,etat,error)
                {
                    alert(error);
                }
            });
    	this.stopped=false;
    	
    	this.actualise=setInterval("clientChronom["+this.id+"].tick();", 1000); // Ticks suivant, répété toutes les secondes (1000 ms)
		$('#chronop_'+this.id).removeAttr('disabled'); $('#chronos_'+this.id).attr('disabled','disabled');
    }
    restart()
    {
    	this.target.append('<div class="background"></div><div class="rotate"></div><div class="left"></div><div class="right"></div><div class=""><span class="decvalue">' + this.hour+':'+this.min+':'+this.sec + '</span></div>');
    	this.time=this.targetTime+1;
		this.tick();
		if(this.stopped)this.start();
    }
    clear()
    {
        $.ajax(
    		{
    			url:'ControllerSession',
    			data: "id="+this.id+"&action=false&state=false",
    			type:'get',
    			dataType:'html',
    			success:function(code,etat)
    			{
    				
    				//alert(code);
    			},
    			error:function(code,etat,error)
    			{
    				alert(error);
    			}
    		});
    	clearInterval(clientChronom[this.id].actualise);
    this.stopped=true;
    }
    stop()
    {
        var state=(this.state)? 'true':'false';

        $.ajax(
            {
                url:'ControllerSessionMaj',
                data: "id="+this.id+"&action=true&state="+state,
                type:'get',
                dataType:'html',
                success:function(code,etat)
                {
                    
                    //alert(code);
                },
                error:function(code,etat,error)
                {
                    alert(error);
                }
            });
    $('#chronos_'+this.id).attr('disabled','disabled');
    $('#chronop_'+this.id).attr('disabled','disabled');
    this.clear();
    }
    fillvar(diff,percent)
    {
    	this.percent=percent;
			this.hour=diff.hour;
			this.min=diff.min;
			this.sec=diff.sec;
    }
    tick(){
        // Instant présent
        //alert(this.state);
        //alert (this.time+'<->'+this.targetTime+'<->'+();
        	if(this.time>0)this.time--;
        	if(this.time%10==0&&this.time!=this.targetTime)
                {

                    this.update();}
        var diff = clientChrono.TimeTrimer(this.time*1000);
		this.fillvar(diff,(1-this.time/this.targetTime)*100);
        if( this.time >0)
            this.loading();
        else
        {	this.loading();
			this.stop();
            
           //alert($('#csi'+id).children('h1').eq(0).text()+' a fini son temps');
           this.enonce();
           
        }
    
    }

    static dateDiff(date1, date2){
        return clientChrono.TimeTrimer(date2 - date1);
    }

    static TimeTrimer(Time)
{
    var diff = {} // Initialisation du retour
        Time = Math.floor(Time/1000);             // Nombre de secondes entre les 2 dates
        diff.sec = Time % 60;                    // Extraction du nombre de secondes
        Time = Math.floor((Time-diff.sec)/60);    // Nombre de minutes (partie entière)
        diff.min = Time % 60;                    // Extraction du nombre de minutes
        Time = Math.floor((Time-diff.min)/60);    // Nombre d'heures (entières)
        diff.hour = Time % 24;                   // Extraction du nombre d'heures
        Time = Math.floor((Time-diff.hour)/24);   // Nombre de jours restants
        diff.day = Time;
 
        return diff;
}

	

		loading () {

			//alert(this.hour+':'+this.min+':'+this.sec);

			this.decvalue=this.hour+':'+this.min+':'+this.sec;
			$('#'+this.id).children('td').eq(5).text(this.decvalue);
			this.target.find('.decvalue').text(this.decvalue);
	
			this.target.find('.background').css('background-color', this.opts.backgroundColor);
			this.target.find('.left').css('background-color', this.opts.backgroundColor);
			if(this.percent<90)
			{
			this.target.find('.rotate').css('background-color', this.opts.progressColor);
			this.target.find('.right').css('background-color', this.opts.progressColor);
		this.target.find('span').css('color', this.opts.progressColor);
	}
			else
				{
			this.target.find('.rotate').css('background-color', 'red');
			this.target.find('.right').css('background-color', 'red');
		this.target.find('span').css('color', 'red');
	}
	
			var $rotate = this.target.find('.rotate');

				
				$rotate.css({
					'transform': 'rotate(' + this.percent * 3.6 + 'deg)'
				});
			

			if (this.percent > 50) {
				var animationRight = 'toggle  step-end';
				var animationLeft = 'toggle  step-start';  
				this.target.find('.right').css({
					animation: animationRight,
					opacity: 1
				});
				this.target.find('.left').css({
					animation: animationLeft,
					opacity: 0
				});
			} 
		//alert(this.percent+'<-->'+this.hour+':'+this.min+':'+this.sec);
	}

}