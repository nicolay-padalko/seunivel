import{o as s,f as a,b as t,t as o,F as c}from"./app-3b27df20.js";const n={class:"bg-blue-700 rounded-full w-12 h-12"},i={class:"text-center text-white text-2xl font-bold pt-2"},d={class:"pb-4 pt-4"},r={class:""},l={class:"p-1"},p={class:"bg-gray-300 rounded-lg p-3"},u=t("input",{type:"radio",id:"opcaoA",name:"resposta"},null,-1),_={class:"pl-6",for:"opcaoA"},h={class:"p-1"},g={class:"bg-gray-300 rounded-lg p-3"},b=t("input",{type:"radio",id:"opcaoB",name:"resposta"},null,-1),y={class:"pl-6",for:"opcaoB"},m={class:"p-1"},f={class:"bg-gray-300 rounded-lg p-3"},v=t("input",{type:"radio",id:"opcaoC",name:"resposta"},null,-1),B={class:"pl-6",for:"opcaoC"},S={__name:"ReadingAnswer",props:{question:{type:Number},pergunta:{type:String,required:!0},opcaoA:{type:String,required:!0},opcaoB:{type:String,required:!0},opcaoC:{type:String,required:!0}},setup(e){return(q,x)=>(s(),a(c,null,[t("div",n,[t("h1",i,o(e.question),1)]),t("div",d,[t("h1",r,o(e.pergunta),1)]),t("div",l,[t("div",p,[u,t("label",_,o(e.opcaoA),1)])]),t("div",h,[t("div",g,[b,t("label",y,o(e.opcaoB),1)])]),t("div",m,[t("div",f,[v,t("label",B,o(e.opcaoC),1)])])],64))}};export{S as default};