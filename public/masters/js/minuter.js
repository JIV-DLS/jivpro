


countdownManager = {
    // Configuration
    actualise:0,
    begin:new Date(),
    targetTime: new Date('2012-11-05 00:00:00'), // Date cible du compte à rebours (00:00:00)
     
    // Initialisation du compte à rebours (à appeler 1 fois au chargement de la page)
    init: function(){
        // Récupération des références vers les éléments pour l'affichage
        // La référence n'est récupérée qu'une seule fois à l'initialisation pour optimiser les performances
        
        this.tick(); // Premier tick tout de suite
        this.actualise=setInterval("countdownManager.tick();", 1000); // Ticks suivant, répété toutes les secondes (1000 ms)
    },
     
    // Met à jour le compte à rebours (tic d'horloge)
    tick: function(){
        // Instant présent
        var timeNow  = new Date();
         
        // On s'assure que le temps restant ne soit jamais négatif (ce qui est le cas dans le futur de targetTime)

         
        // Calcul du temps restant
        
         if( timeNow > this.targetTime || timeNow == this.targetTime){
            timeNow = this.targetTime;
            $(".progress-bar").loading({hour:0,min:0,sec:0,percent:100});
            clearInterval('countdownManager.actualise');
            return;

        }
        var diff = this.dateDiff(timeNow, this.targetTime);

        var fait=timeNow-this.begin;
        var doif=this.targetTime-this.begin;
        var percent=fait/doif*100;

        $(".progress-bar").loading({hour:diff.hour,min:diff.min,sec:diff.sec,percent:percent});
    },
     
    // Calcul la différence entre 2 dates, en jour/heure/minute/seconde
    dateDiff: function(date1, date2){
                                  
        var tmp = date2 - date1;
         var diff = {} // Initialisation du retour
        tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
        diff.sec = tmp % 60;                    // Extraction du nombre de secondes
        tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
        diff.min = tmp % 60;                    // Extraction du nombre de minutes
        tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
        diff.hour = tmp % 24;                   // Extraction du nombre d'heures
        tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
        diff.day = tmp;
 
        return diff;
    }
};
 /*
class CircleProgress
{
   var countdownManager = {
    // Configuration
    actualise:0,
    begin:new Date(),
    targetTime: new Date('2012-11-05 00:00:00'), // Date cible du compte à rebours (00:00:00)
     
    // Initialisation du compte à rebours (à appeler 1 fois au chargement de la page)
    init: function(){
        // Récupération des références vers les éléments pour l'affichage
        // La référence n'est récupérée qu'une seule fois à l'initialisation pour optimiser les performances
        
        this.tick(); // Premier tick tout de suite
        this.actualise=setInterval("countdownManager.tick();", 1000); // Ticks suivant, répété toutes les secondes (1000 ms)
    },
     
    // Met à jour le compte à rebours (tic d'horloge)
    tick: function(){
        // Instant présent
        var timeNow  = new Date();
         
        // On s'assure que le temps restant ne soit jamais négatif (ce qui est le cas dans le futur de targetTime)

         
        // Calcul du temps restant
        
         if( timeNow > this.targetTime || timeNow == this.targetTime){
            timeNow = this.targetTime;
            $(".progress-bar").loading({hour:0,min:0,sec:0,percent:100});
            clearInterval('countdownManager.actualise');
            return;

        }
        var diff = this.dateDiff(timeNow, this.targetTime);

        var fait=timeNow-this.begin;
        var doif=this.targetTime-this.begin;
        

        $(".progress-bar").loading({hour:diff.hour,min:diff.min,sec:diff.sec,percent:percent});
    },
     
    // Calcul la différence entre 2 dates, en jour/heure/minute/seconde
    dateDiff: function(date1, date2){
        var diff = {}                           // Initialisation du retour
        var tmp = date2 - date1;
 
        tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
        diff.sec = tmp % 60;                    // Extraction du nombre de secondes
        tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
        diff.min = tmp % 60;                    // Extraction du nombre de minutes
        tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
        diff.hour = tmp % 24;                   // Extraction du nombre d'heures
        tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
        diff.day = tmp;
 
        return diff;
    }
};
}
*/