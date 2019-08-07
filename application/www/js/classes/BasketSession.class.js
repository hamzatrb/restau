'use strict';

var BasketSession = function()
{
    // Contenu du panier.

    this.items = null;

    this.load();

};

BasketSession.prototype.add = function(mealId, name, quantity, salePrice)
{
    
    var i;
    // Conversion explicite des valeurs spécifiées en nombres.


    mealId      = parseInt(mealId);
    quantity    = parseInt(quantity);
    salePrice   = parseInt(salePrice);
    

    // Recherche de l'aliment spécifié.


    for (i=0; i < this.items.length ;i++)
    {
        if(this.items[i].mealId == mealId)
        {
            // L'aliment spécifié a été trouvé, mise à jour de la quantité commandée.

            this.items[i].quantity += quantity;

            this.save();

            return;
        }
    }

        this.items.push({

                          mealId    : mealId,
                          name      : name,
                          quantity  : quantity,
                          salePrice : salePrice

                     });


        this.save();

    
  
    


           

    // L'aliment spécifié n'a pas été trouvé, ajout au panier.


    
};

BasketSession.prototype.clear = function()
{
   
    // Destruction du panier dans le DOM storage.

    saveDataToDomStorage('panier', null);


};

BasketSession.prototype.isEmpty = function()
{

    return this.items.length == 0;

};

BasketSession.prototype.load = function()
{

    // Chargement du panier depuis le DOM storage.

    this.items = loadDataFromDomStorage('panier');

    if(this.items == null)
    {
        this.items = new Array();
    }

   
};

BasketSession.prototype.remove = function(mealId)
{

    // Recherche de l'aliment spécifié.

     for(var i=0; i<this.items.length; i++)
    {
        if(this.items[i].mealId == mealId)
        {

            // L'aliment spécifié a été trouvé, mise à jour de la quantité commandée.

            this.items.splice(i,1);

            this.save();

            return true;
        }
}
        return false;


   
};

BasketSession.prototype.save = function()
{

    
    // Enregistrement du panier dans le DOM storage.

    saveDataToDomStorage('panier', this.items);





};