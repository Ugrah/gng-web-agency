var getAmountFromQuestion = function(){
    var questionsAmounts = [
        {qualityOptionRadio1: 240, qualityOptionRadio2: 160, qualityOptionRadio3: 80},
        {typeOptionRadio1: 180, typeOptionRadio2: 180, typeOptionRadio3: 360},
        {designOptionRadio1: 240, designOptionRadio2: 720, designOptionRadio3: 480, designOptionRadio4: 50},
        {profitableOptionRadio1: 30, profitableOptionRadio2: 30, profitableOptionRadio3: 240, profitableOptionRadio4: 60},
        {loginOptionRadio1: 240, loginOptionRadio2: 150, loginOptionRadio3: 0, loginOptionRadio4: 120},
        {userSpaceOptionRadio1: 240, userSpaceOptionRadio2: 0, userSpaceOptionRadio3: 120},
        {websiteIntagrationOptionRadio1: 240, websiteIntagrationOptionRadio2: 0, websiteIntagrationOptionRadio3: 120},
        {adminSpaceOptionRadio1: 240, adminSpaceOptionRadio2: 0, adminSpaceOptionRadio3: 120},
        {languageOptionRadio1: 0, languageOptionRadio2: 120, languageOptionRadio3: 240},
        {advancedFeaturesOptionRadio1: 240, advancedFeaturesOptionRadio2: 0, advancedFeaturesOptionRadio3: 120},
        {statusProjectOptionRadio1: 0, statusProjectOptionRadio2: 0, statusProjectOptionRadio3: 0, statusProjectOptionRadio4: 0}
    ];
    return questionsAmounts;
}

var getDevise = function(){
    var devise = {name: 'Euro', symbol: '€'};
    return devise;
}