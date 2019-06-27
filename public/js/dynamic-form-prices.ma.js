var getAmountFromQuestion = function(){
    var questionsAmounts = [
        {qualityOptionRadio1: 550, qualityOptionRadio2: 350, qualityOptionRadio3: 200},
        {typeOptionRadio1: 250, typeOptionRadio2: 250, typeOptionRadio3: 400},
        {designOptionRadio1: 250, designOptionRadio2: 250, designOptionRadio3: 200, designOptionRadio4: 200},
        {profitableOptionRadio1: 250, profitableOptionRadio2: 250, profitableOptionRadio3: 200, profitableOptionRadio4: 200},
        {loginOptionRadio1: 100, loginOptionRadio2: 100, loginOptionRadio3: 100, loginOptionRadio4: 100},
        {userSpaceOptionRadio1: 290, userSpaceOptionRadio2: 200, userSpaceOptionRadio3: 130, userSpaceOptionRadio3: 140},
        {websiteIntagrationOptionRadio1: 200, websiteIntagrationOptionRadio2: 150, websiteIntagrationOptionRadio3: 250},
        {adminSpaceOptionRadio1: 200, adminSpaceOptionRadio2: 150, adminSpaceOptionRadio3: 250},
        {languageOptionRadio1: 120, languageOptionRadio2: 115, languageOptionRadio3: 125},
        {advancedFeaturesOptionRadio1: 100, advancedFeaturesOptionRadio2: 105, advancedFeaturesOptionRadio3: 105},
        {statusProjectOptionRadio1: 0, statusProjectOptionRadio2: 0, statusProjectOptionRadio3: 0, statusProjectOptionRadio3: 0}
    ];
    return questionsAmounts;
}

var getDevise = function(){
    var devise = {name: 'Dirham Marocain', symbol: 'Dh'};
    return devise;
}