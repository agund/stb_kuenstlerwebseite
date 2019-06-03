/*AEDK7 Jacqueline Struyken Arbeitsplatz #14 */

SET NAMES utf8;
USE kuenstler_DB;

  INSERT INTO kunde SET
  kunden_ID = 1401,
  anrede = 'Frau',
  titel = 'Dipl. Ing.',
  vorname = 'Andrea',
  nachname = 'Sprint',
  adresse = 'Vogelweg 1a',
  plz = 16515,
  ort = 'Oranienburg',
  geburtstag = '1981-04-02',
  email = 'andreasprint@brandenburg.de',
  telefon = 03301250748,
  reg_ip = '10.12.15.14',
  reg_datum = '2018-12-17 23:00:12',
  status = 'inaktiv';
  INSERT INTO kunde SET
  kunden_ID = 1402,
  anrede = 'Herr',
  titel = '',
  vorname = 'Hannes',
  nachname = 'Brandt',
  adresse = 'Hauptstrasse 24',
  plz = 16556,
  ort = 'Hohen Neuendorf',
  geburtstag = '1975-12-01',
  email = 'HBHN@googlemail.com',
  telefon = 03305650782,
  reg_ip = '07.12.15.14',
  reg_datum = '2017-09-17 21:10:22',
  status = 'aktiv';
  INSERT INTO kunde SET
  kunden_ID = 1403,
  anrede = 'Herr',
  titel = 'M.A.',
  vorname = 'Malte',
  nachname = 'Plotz',
  adresse = 'Winkelweg 8c',
  plz = 16727,
  ort = 'Oberkrämer OT Vehlefanz',
  geburtstag = '1978-06-04',
  email = 'MasterPlotz@googlemail.com',
  telefon = 0330,
  reg_ip = '192.168.15.14',
  reg_datum = '2018-09-11 15:23:00',
  status = 'aktiv';
  INSERT INTO kunde SET
  kunden_ID = 1404,
  anrede = 'Herr',
  titel = '',
  vorname = 'Michel',
  nachname = 'Heine',
  adresse = 'Straße 112 7c',
  plz = 15467,
  ort = 'Seereich',
  geburtstag = '1985-06-24',
  email = 'Kaffee@gmail.com',
  telefon = 03300213121,
  reg_ip = '12.18.14.11',
  reg_datum = '2018-11-17 03:00:33',
  status = 'gesperrt';
  INSERT INTO kunde SET
  kunden_ID = 1405,
  anrede = 'Frau',
  titel = 'Dipl.-Arch.',
  vorname = 'Sofie',
  nachname = 'Richter',
  adresse = 'Sonnenallee 500',
  plz = 10587,
  ort = 'Berlin',
  geburtstag = '1985-06-24',
  email = 'Kaffee@gmail.com',
  telefon = 03034810,
  reg_ip = '121.181.141.11',
  reg_datum = '2018-12-06 06:15:00',
  status = 'aktiv';

INSERT INTO `kuenstler` (`kuenstler_ID`, `kunden_ID`, `avatar`, `portrait`, `pseudonym`, `iban`, `bic`) VALUES
(1401, 1401, 0x89504e470d0a1a0a0000000d4948445200000064000000640803000000473c656600000300504c5445fffffff5e5b3e7e7e3d5dde74ac9eb7e6891e1854e141620eb6c4aedc19d7cdbd5b7dd78421600523c34f1d1b5a57460e1b38b58b7b3b18974484646148ff7f2c7a119587cf3e5b1070a179d78deb34ec5c9d5e3151820e5e8e4f3e3b00e101aebc19cf8cca5191817d3dce6030208e6e5e1b7dc77eaeff54d373070d8d1eb6b47f3f4f412151efffefd0b0b0ffbfaf6b4db73eb654046322c2f05013635347a648ef2fbfcfbfdfef2c59ff9f0c9fed4aa543f373f2b2676608bf6e8b9f0be93badf79dbe3ebe28750ed6e4bd1d8e3fadbc92b2321ebc8a62a2d2e7ad9d2fbf0bdd3e0ede0e8f1403e3dfbf2dfe2f5fa69507f665247d3d0d3e2e3dfedc59faed8665f4437fa6d47c6a4873a1201e9573086eee77fdfd9f0c39d735b4d4aceef7e6454e3e5e2edeeebfdf4edf3e3adefe0a94ac7eb89705ed9b49325bee8ed5f37df7c41dd713234c3e9aeabbbe5c09bc1e67d0887f946c6e7eaebe8e6ecf2bf997e1a1e25c14324f1f2ec8c7e979d93a8816a9279ded91513168fe0deeaf3d5e96c49e84b209a7f6a1c0502c1ecf5b4947cc2c1c2a97159ecbf98b06445ae40c1eacdb1bc9278c4eb7efae4d9555048966ddab3ebeac0d1e1e18147b58069d1f1f7ef8a4e80aabee7844ffb9755486c72705986dcdadca6d4579be9e67c6890ec946efac699eda17fbec2cf28444c6ba8bbd4ad8be7dbcce2cfc15e4375eb7d564de0fccac2a6c7da87efd7abcadae9957764a18b76cef784eed4ba094b71e68b5b3fcff4a8a5a0737579ddebbad96327a5836da7776360a6a8291714995f46d16e4bf6c5b28aa55c4dc6d0e1fb8e7b959ff0ac9231dafee0b799677b4acfe4a3f9d8b9cc7e52431d17f06a4591aca3f9e1b674c7c5e0cfec4a818b3fbfc0c7a9e06a66644d4640704b38e8b18944503af5d3ab4ab1ad4e94a1a29981e9e3ec64d2efc9b296f5fbef98c4b8b4e2732e6a8784dbf3e672446cace6b3e1653897efc0cc79d5987636585fad8ce2a4c46bdd613dde6b49f77e3ec762e18fc1e3d77a4f936092bb5ecc4bb6bfc683d58683768e60d9d6bdb79385b4df8560d0706ca8d19256000008de494441546881ed59cf6bdb581e0fbcd382d70b3d5ab387ad3a2860bc82bc45c2100a82a76699113175c0f45d42ba3d3427f7e285dd812530a21eb0ca1c06f696cbd043721896161f3aa784dc068c996208040229ecfe09811ae7b4efb79ea427d54933b77ce33a72f3fc3efa7c7f7f9f5656eee44e2ac56bba4e1404b68d908d82af074ed3bb65049fec0f10d95e0ab906361834fddb43b0f5fdb9008e848266eb1620dcc0ce03e8421845fe67e234ed0207034ef039e6716d2bb35b10451d2651146461a29b1ac70f1053bddaaad3bd7a3c8510d6a6bdab3e8a406a1d0233b8118c93d240018822e0ef4c31ae31c104e822ea70080e86c0f54de347290dd0e9befbf9026cc39a2618c27fda814061be665ddbd1b8d3b22f479de7355c83d35a5e70adef289d01baf23a645a9e85842200eabc3ec285fd259b9da78a0953d935dc8c6000a16fe43e87251054e29da7014a7150e02ecbc3b190a06123eff9510546ad066bdd40ada69967492e94872082dc37b04c5792cb552051d837c0525c9a0c83fda0ceb09a0795a3ab3f6634f6f5322896725de25753c903333173e9460281bd5b9ff6319fbaae24e2ae41097176767cd6eb1961606f9f50418209b0ad7f7c0a24d21c2b0a84b2307c550fc3af2627bbbf37b91aec470080546356b3128238964d0dc2ee0bb93dbe258e0fc27a7d72524f269b2fa7453278753f90598ce220bb1a0521ce99fac9c012fbc5bb613da93349c2f347459478f894dd1510d6b42ab3a59dba0921f2981389efb525064199b48f0b1e175f4534637305d09f2a85b9964eda17e924de1fd3dd055032f9fedb7c9ec1abdd809911c85c54915f00620b785eec74ef0b224a59fc77d27ebf96b33f26a617bbf3bb2ccfc84d8b711519c213490bfe149ef3edd5bf49789c2503df45e26b2af0bd12144b962066bf26f72dd80b35169251fb9733dd32f1cf99dc4243b22458a44578668cfebd2ab4f57eac7c4bbe28997b47695ac3bdfd2dedcb155611d610cb065dbec583fd71a2f6d7e5fde6bd9e8481f8905b84bfe84d9a1dcc45b60c752d37627c304eb594da85cae4fd933501130f89ba5818db3cbb022b30c58ac3b505d8625248de72936cef695a92b6511f37777b5880c886407616c6b09716e1c6431e0f45eac03922da47c2a6cdfc237e1dc9ac2ac21921a768fa9695ea8a868908459a524cdb27f2229cac9185f13b1128425b6417cbd0f0b19a2bd7d09af80537e9c638bb75a2b91a7bfffe981400b8b395fa0cdf06a1a2be82b42068691ee2c4a0288d48bdde7ef988ac5b178905891c4eeb4a01c407489636a651afcf920a9c3e1ceb264fb200945798ac63d2820d03a92cee66241e0b46716502e5b95e2615d8dbcbd93cc9112154fe8a556251a985762e0527762d5b2d6126114965354cf5947362a5af750ab2fd34d082992b2ddf52389652163349b42a998c73ee5400ddfc0bf54338549697da28444a806c9517689f62f3d617d60eb28a2a282f4938483c7464280211050510806c9914e80ad970e1e941d61419e3d0abf370c2417668a1e729494015dc0bf0a98d1321c5e457514ca6ed71c6d8f5c265f80babfa78da15e94bb818a192772f4b9a8bffd915c308c6633d2726f5938c71e86bf32d5685cb560601461024d21ae0f55d4e233019e7ed908bcbb6689ce26f02152adc36b9c2d56a89142c9c0bf9f765cd7b12eadb2679eb24e18b75c1a4d7e54e9c16fa1c93d60fa2da08e7eaa4200f4b7d975d6efe410d92876934b27df225b8a53b17a9587d59c1e33761464fb98849ceb903b31a3a0cc47cc6204031d94b9bf078f7dec89e07f60ec67922bafac25dd551c6c32d118ab2e1f99b314ea446ffdb538d55bc5588423d31b7b5952a478a7b2dc44924229e5582284adbea07bba4ed4af25c546bbc910ec5f1304a95c1aaab93c5680d2c24f34176c09279b86815faabfdf2480309526550a517e6c7a625fb255a4cdec629482d1917ab9688c964f371da49fe993151e5c490855d4b1885de823fd57addf85558e0a11c2cf52da62eb90330d793157ecac1d9b8f7530c5281b70cad1d273209b56925fedf40950a4a864c29f9d26823990d483f9f9940e29dd04484be852f1e69eb2eb48e8500197a487142809849b2638e366965bd2b211958a3bc0d029921e9cb00e25a2abb79d3dcf8f120e109ec246792f34dfde4086acd043389a185b410bf075515b5af4fff139e177ba28d67df65666ed81f00597d01300d8e2d36f5b16ee85d9c0321f3ef61da482a2aedefb2a310af5b92896d1ab65c31c123bf571cd631de6867ec9224f5673bf975ccf4c2474b0e5964a0faf70b1804e5c1df335cea61dd702f313d36b0cb7c8bf9171be2d1a06b02a123ee432d2adbbb79ef6056593d1485ab64ca16d51179052d48147826134cf8bbfcfc9ba162979f1710d3532a9ef1fc84a388a92b69bf2a5903d9846a6ee9050a4df7112a81e0f59e5be4e4d9aa198516fa2a222b2ceaedf27334281b3d1aea4f1e19d7e0e96150617641a5dc24b5f84598a694f699711926730aaa3a90586147837e9949e0f33d2d1b87ed75e3d11765422b49d5315160b925079bf4ac482f2b93d01027dc2655ca6262b9ff32aa213ed67950997c657063b84d66c7eae32e6a96c0148ab0f66527d3cc93d79f66cd8bc2d9777c1580654ed30d20f1375ed389ba3fea697863167df051defc71bf536d752105ef82bd46d3190c9cceec30113c928dd980fc4fe4cf3e66cf24e1d0464b3d7ce865333ddcbe1c8d1cc719388328da3fa4d2dd0a228231f04f1bf34b1d85787069a867a5a53b31861f2f1b8dd1e843936c4aefde6f9c362920f9e4cd46a346e352eb8ae28b651f6fb55a9a73320c82d29879948cd7598c46a74d8ae8f88b06fbd3656a18d85ffad946cb55a51bce1b5c46a3c5e96cf66131a297737239fb812073b95c55be35581683cad591b447a3a1601a72db11fb38527fbae473109c76aff7c0e9f5146731aa64de58a73cdeec5dfbd1d91462bc1c06a1b283717c712d5d71f1fb471fe79fde5f2a6cad7b93078d2d7f6fa1e9bd5288c7ddfcf9afb35806654442e7c61002e61338346e3e0b824aeb745e8e336a2c66b7f2447ec57316269c110dd0e6e73e8ccf08582ce673be377d9f2f18c06d227071bd0f33fe331b3006b70f7127777227bfa5fc1fda62d79ea4cedec20000000049454e44ae426082, 'Frau Andrea Sprint ist eine ...', 'AnSprint', 'DE02WELADTAT1234567891', 'WELADTAT'),
(1402, 1404, 0x89504e470d0a1a0a0000000d4948445200000064000000640803000000473c656600000300504c5445fffffff5e5b3e7e7e3d5dde74ac9eb7e6891e1854e141620eb6c4aedc19d7cdbd5b7dd78421600523c34f1d1b5a57460e1b38b58b7b3b18974484646148ff7f2c7a119587cf3e5b1070a179d78deb34ec5c9d5e3151820e5e8e4f3e3b00e101aebc19cf8cca5191817d3dce6030208e6e5e1b7dc77eaeff54d373070d8d1eb6b47f3f4f412151efffefd0b0b0ffbfaf6b4db73eb654046322c2f05013635347a648ef2fbfcfbfdfef2c59ff9f0c9fed4aa543f373f2b2676608bf6e8b9f0be93badf79dbe3ebe28750ed6e4bd1d8e3fadbc92b2321ebc8a62a2d2e7ad9d2fbf0bdd3e0ede0e8f1403e3dfbf2dfe2f5fa69507f665247d3d0d3e2e3dfedc59faed8665f4437fa6d47c6a4873a1201e9573086eee77fdfd9f0c39d735b4d4aceef7e6454e3e5e2edeeebfdf4edf3e3adefe0a94ac7eb89705ed9b49325bee8ed5f37df7c41dd713234c3e9aeabbbe5c09bc1e67d0887f946c6e7eaebe8e6ecf2bf997e1a1e25c14324f1f2ec8c7e979d93a8816a9279ded91513168fe0deeaf3d5e96c49e84b209a7f6a1c0502c1ecf5b4947cc2c1c2a97159ecbf98b06445ae40c1eacdb1bc9278c4eb7efae4d9555048966ddab3ebeac0d1e1e18147b58069d1f1f7ef8a4e80aabee7844ffb9755486c72705986dcdadca6d4579be9e67c6890ec946efac699eda17fbec2cf28444c6ba8bbd4ad8be7dbcce2cfc15e4375eb7d564de0fccac2a6c7da87efd7abcadae9957764a18b76cef784eed4ba094b71e68b5b3fcff4a8a5a0737579ddebbad96327a5836da7776360a6a8291714995f46d16e4bf6c5b28aa55c4dc6d0e1fb8e7b959ff0ac9231dafee0b799677b4acfe4a3f9d8b9cc7e52431d17f06a4591aca3f9e1b674c7c5e0cfec4a818b3fbfc0c7a9e06a66644d4640704b38e8b18944503af5d3ab4ab1ad4e94a1a29981e9e3ec64d2efc9b296f5fbef98c4b8b4e2732e6a8784dbf3e672446cace6b3e1653897efc0cc79d5987636585fad8ce2a4c46bdd613dde6b49f77e3ec762e18fc1e3d77a4f936092bb5ecc4bb6bfc683d58683768e60d9d6bdb79385b4df8560d0706ca8d19256000007f9494441546881ed9abf6b234916c74d671d4b1dcd36b4ee2836281a250d3297340bcbb961a70de356a0440355c3624732a23d477b9281039b06c30836d964128377e56099b399c0fa13fc17c8308231762404972938146d55f5afeaaaeab6ec990d0ee6d996c646aa8fbeeffbdeabfe311b1bdfe2af0bbbdd6e4308c9a3fdd7ac0f231c9a1a421af9419a19620cbf2a8900b4000004101f00045af4b5409d480328d01441a0408b3a5fccb1db5a804000540c8a09100acc2f74086a410600218e2208b5b00da388b86316a040834f47b44b889dc16adaf01dc71f4d5657ef71c8a92398f6d31036753b59044578301df9bedf6041ffb1da81187169d39e54026d0da50c80f1d58d9302b2f03d7f8071a6c6044f1203b34c91371f4f7d0191e899bc87262ac4a0478ae9844121e3d0532048dcf8fe9ba82426ec3c8e813237da2b4f8960629cc37b5c14002294b5c5b439c777a64e258388f15690a380f58d2974000c27758c444bc457d99a5a688f67cd111daa2c2f8533d9018518b49e163bcc874800df8895abc898efac6e23aec8c287a5700c333a1ed5272b13333a8619c55c878203904f2578e87f5a07d270a6ef235068c10f3020c885a3fbc1a83e5937d3ec05cec42c2808d4cfcb4ec84d7558d3218dc68878313b4aeb82b6256f4b5d89718668081ed709212372bfd59f7d6e24aff1f88491a6ac1142aa572b845ca50b7c221f97f366447e775e1c5d1b7dcbeab7fe7d9632af6061664d1ddb7cb210c6691ffa2f7abde9943c93c53ff98dd168bafb7a6b66582c0c63374d18ef0aa899621871bd0bb381e2ac8c7f9c5effde7b7d747974d4ebdd5db75a5d22c2d22d5db7ac56efc64f0a6c879382aa2b2ce4921564d972a6fb466ce9fd6ed730b68c6ebfaf271af458a7206bb6629fc57738ebc9db7185f55cf952dfd36e773e7f4857d5d3e59988f48b48b963f531f22611f719abcab854bec493e4133ad33dc32a470e60df5de3927d186f028b7757ba42f65bee55019cfc93a5e1a2dbd52d0993668b3cc4b3d72cafb4ebb9f7234d79a054124206d7c463a5d96b89885c44922f639f5508739e83287b8534a2c9413438f1462c5b5b12244b589c50666c329029790fb8155473d22ed94ef744a6c4bb686daa1871a125fef973d2a4c7bc12b5f5b87c2c8a2266bcb7fa99ad57677d525f3e81f0a9008a2ab64311f2860dbfab992a5b79b20a53044f94fb4adb2c658bf4c91581f837bd0fb1da93acc474cbb07619e48788f784d697942d5486003684fdd19d2143f4d297b5d9bd3813fb844290345a044bb4200a277ec37979a74817755b2f2ab9bf49dbd19bdc97218a1d32144f73d03d31e5ece59e520957c2bab5b94521ce242ae742933ac5962111d97dfd177bb37da9b8324f5257fac6e559b2a1084a44e73b12440bef279e3f5236bc5e60c893a15f90c44e51249c8f49e3ab3cb85257def80ea92e59495e57c9f7a6b5eb35fcc34833cb0b88e3aba380001caebcb3cf33c993bcb0524f8ceb29d91506505c0199420d8b6dc2287030fa57b69b48c6e7cd62b5f65efade3412b3459594f3150119629283a2ef2e5a7d1912f37338fed0fb2f3d860c4c11224e2fa88090020ba6a37d71cfb28aa19218f361e5398750443048c9137106a752c0f7efa797cae1c537bcb5fbb709c44ac8c39e302dc747b1225fbc29b39e33daa1ae4be91237474575312dc83cafe8f8346756dfba3cc464bb029214a9baa01aa299e1d8722b3c49a4b8d6f82044a62c44ae2e7976a510f3f98908293962b927ec1a882c44de80c51d3e0f7030b6c4bd91df4cdcfdf18152079d5d1b1ba2928a2b4166781ec7a292385312ebe7cf4d254375bc8203b529346352c28aadd1dd62eb9b8a4fa8d84f92964740fe2109db7725469cbbae2a2ca6443e5c51ccfaf4a51aa209d35552dc789ce44a85519c6fd9e9fe2bea6071f0d18d45081113bb8ca10ed521d146c42e94aadd07a4255d4949ec9e573354c7115ccf0b5ae89369e27289b10671c7077510d5295d95292c4cd32c77be4e3dafd09d664b79cd809ac2de963fa0dc2582b9059c189da6eab6aae8357600a93ca14b067181c973973c90d931ce85c45b63f27b75ae2ab255d45769fd72cec6719aabb8a6acd26c559c34667b4a3967c583094eb229e69e04f5940a21d9817d65be48e7e7a6c431e9f43a46f53509f13ca8bc0c11e266e398ccacdbb0c6f79a6b387cd78b3a58b2b856894fd4138b45edd528da2b1941d0010e3ec6c5be4267e3795849a9bf4c949da5141d92684158e3c71765c5ee470dab7d41e0fb6ac446b277c98d4c8ea5e7bfbaa7a5b1d2777f9def88670b69b21eb840985f96c8b59826da7eb76c0e87f3fd536ede9fbaf3e1b0b9dc96c5a0872f74b30ae3e78986f07fe87ae47b707a7adaef6f7637c9f3a0396c92eff9b36d24748c78e0a808e958d2a4329a3486c3e1ff067f5cdfedfd31f88d32d9df9a4bc99075eed824759c1963be9da78c94d35c244ff95f966ff94ff5f0b5d4440b37c300dee619f9cafcbf87f3e23e4af5cc9228dcf5e777f3a1cc1088c3796effda0c7aa3293ba90fe70f2152caa3191bd417362bb7978a5c2928a494c9512408d6f3230f08020070b058874162f1f70890773cf64e60db0cb477f3f51024e6efc8eb9f705313bf5d2f59492cdf3ec68e225e3d5c595910ef5f3d05418acc5e36d7c2d021f6e4dbbfb68dd7c00c878b39b69f7e8fd9a698452d862096c48d2fbb8f6ddbf019f14609a27f9e3ffb823bd825d0ab1fe7f36689447f592c963fbefa9aff85c186b73ffdb25c2c16c364f9c5f2979f9e43fb31b761d78b0eb188feb0c7ced75f3f0d0a201eb3a76ff12dbec5ff5dfc09b843826548ed23030000000049454e44ae426082, 'Ich bin zweifellos grandios ...', 'einHeine', 'DE02WELADEAD2143658791', 'WELADEAD'),
(1403, 1405, 0x89504e470d0a1a0a0000000d4948445200000064000000640803000000473c656600000300504c5445fffffff5e5b3e7e7e3d5dde74ac9eb7e6891e1854e141620eb6c4aedc19d7cdbd5b7dd78421600523c34f1d1b5a57460e1b38b58b7b3b18974484646148ff7f2c7a119587cf3e5b1070a179d78deb34ec5c9d5e3151820e5e8e4f3e3b00e101aebc19cf8cca5191817d3dce6030208e6e5e1b7dc77eaeff54d373070d8d1eb6b47f3f4f412151efffefd0b0b0ffbfaf6b4db73eb654046322c2f05013635347a648ef2fbfcfbfdfef2c59ff9f0c9fed4aa543f373f2b2676608bf6e8b9f0be93badf79dbe3ebe28750ed6e4bd1d8e3fadbc92b2321ebc8a62a2d2e7ad9d2fbf0bdd3e0ede0e8f1403e3dfbf2dfe2f5fa69507f665247d3d0d3e2e3dfedc59faed8665f4437fa6d47c6a4873a1201e9573086eee77fdfd9f0c39d735b4d4aceef7e6454e3e5e2edeeebfdf4edf3e3adefe0a94ac7eb89705ed9b49325bee8ed5f37df7c41dd713234c3e9aeabbbe5c09bc1e67d0887f946c6e7eaebe8e6ecf2bf997e1a1e25c14324f1f2ec8c7e979d93a8816a9279ded91513168fe0deeaf3d5e96c49e84b209a7f6a1c0502c1ecf5b4947cc2c1c2a97159ecbf98b06445ae40c1eacdb1bc9278c4eb7efae4d9555048966ddab3ebeac0d1e1e18147b58069d1f1f7ef8a4e80aabee7844ffb9755486c72705986dcdadca6d4579be9e67c6890ec946efac699eda17fbec2cf28444c6ba8bbd4ad8be7dbcce2cfc15e4375eb7d564de0fccac2a6c7da87efd7abcadae9957764a18b76cef784eed4ba094b71e68b5b3fcff4a8a5a0737579ddebbad96327a5836da7776360a6a8291714995f46d16e4bf6c5b28aa55c4dc6d0e1fb8e7b959ff0ac9231dafee0b799677b4acfe4a3f9d8b9cc7e52431d17f06a4591aca3f9e1b674c7c5e0cfec4a818b3fbfc0c7a9e06a66644d4640704b38e8b18944503af5d3ab4ab1ad4e94a1a29981e9e3ec64d2efc9b296f5fbef98c4b8b4e2732e6a8784dbf3e672446cace6b3e1653897efc0cc79d5987636585fad8ce2a4c46bdd613dde6b49f77e3ec762e18fc1e3d77a4f936092bb5ecc4bb6bfc683d58683768e60d9d6bdb79385b4df8560d0706ca8d19256000009b1494441546881ed5acf6be3481acd4d075d4cefa5cc0a3409a27c886cd7c1c4cdf442d4b0787ce81002adbeedb02c0393d344b089691682a19b0d3e8c88efbb3ef40e787661c40cbaec9a813e1813da3e064ce31c76e8e04b30c47f40a661bfaad28f5249763b99cc9ebae2c85647aaa7f7def77df5c3bdb6f6b17d6c1fdb7db6e2f366af371a8d7abd5ef379f1debb2f6f3647d8668d109bfec007abd92cdf1fd466cfb36ca262cb717dd7a5bfbe63591890bc51b37a2f383d0aa0aac471e7fd4acd44c840a83eeccf7d0bab53001a35cbf70081b18a55d71f5e0080a92ba6a228f0a951e9fb168063427e219d916daba013769da18e7493f64f9ba6689aae1b8dbe0ff084908ed5bc334a93b2c0a0d460d8404a0ca0f097a61b17d855d915f6e8f24e10975e874160cbaf203de89dbf69e1896ef41d955ea3da9dde1dac69126a37c0387e0d9962f7f18b9a33742dea99aadadee56d351b7518864afcb98642a192181445d38c0b2b44b16fe98c6733088cadc186ae25dc1008d1006894808bca6048e756616653ad1886df40813469228131461f14a35454b5b3baff5512f080b8aa20259246e21182eac6dc55550eb3b2fdc5c00e30ddef97228f65db23260a5266940a8bc555b978343b3063e2577425c448ea156ba8280d08644be5a1ac7656aa32b414f21f20a22b51e37d9b49df95908aa3322ed4fd15141b75420c70e4b50012756d66a0404eaac15dc0e54321d6b371c803881c6b690c1941135ce1f9a236976380e998f3869fc16f90293191e3386cc6cc536394e5e617494484da5e43090c01420c2efa561a3a56f07054b0de32c17adc752e973b1779442826b74564a269088a8b1ade0aa3c312c1aa20961a5b32172d119f5f8bfc0f1baacf9c5883a5957f14862f3bf87da4c94c4cd9fee04f489f5baa702f54b10518e58e2016c6830b246380305246064d476c6009ee8541cc79be00c42282eb980c12bec7152c0eae88a906206e48850bb62059aa9d2845a87bb38186648cd80c4a0a3d7b500b62c364e918dfbcb0868d84d0a2f99b6612f961b2a984f1e0d37a3068ea41ce875416e47db16a13412cea4925ed496cbbd9301e1dac1fbd36996408cd9d482d5e5c324b58b38345b9b09cf05249d14ca39bcb7df13b760d081b8044f7db5ed67439122b64e2cf4b9a8421544710ab95cbe53ee182a1ba67e118811597acb4ef24628b657c7632b243c3d83b008c5c2b57a3b8e8025b6ae276d02b6d7db3233c08a3e2100da5988484508561e472eb3f6e988a66c4b52bb43eabb68cec8423f0e6a84a46a2d017f8f12817b6ed17309fa1207108f3f74e1ac42209040ae2485538ac8d10b09f7f1681e4d68f6aba31742d516d16c43db9b45cda922534512a19e309d040c68b5600d0a5bfaf5e68064ff884606953ca1d2cd325c9e215e5397a76d0ca89ede1d16b18b41232305352f5abd9513196ae83893694573d1ee7355347c6ce8387020d1661473536c113d582577a181ed9520482279662bcedeed515046b13dd8423d2ea3fb4b6df246800d42b60228e8c0bc3cbb21355811bdf30ea4f5f75bf7eb1f768a7513bddfbf287bfbe69492c422634bab0d4832d83d8d163449791c18e5183287a93db6eb5b65bdbdb39894388f5f0eb0d98a95a921230a8c823d7951c5c14e402a183fd54c70900165d3f82f116961f12db720c47a3bbc0178c3746997d7713ffb2fea5ce26aa925c2455edc5f9163f50e375e3b314481af5d3bd9231e44ba1841c723696e5f2c88d47c6d127d94f1f9cb2630b18f3555d420b9cc944d28bc9f5f9d364c7dd34ce760eca4adf95ab3080484cf8b028e9458dd70e9679ce2d79b1a19558c6279f313d9948952e3a6ac1d2da384a752bebf64545a7b52b1935f4958a2ecf4ec606bc1c0be63ce8d9d35c760bb1267fa81d37e42a1c30919291961521dbe9c17161510af1b52ff4da4de174d7ff786c6a61c68b4f992e2b30304a6ab15529cc49ba191209e793f5b77055292e90915a6990cb78f415331e9ed13d5b623a346f88c0133adf961e13e62b1248d94e8c38ec05c6c3e86d7b0bfae767670ebb0a325e0aaeac99974592d32ef0446dd0db876e0aa01b7f9838a486e28984809331fc56477662de8479c66bdaf1d09fee670104a78e5a4730411a3a96a884ca16a83291d0790187c9d530884b66b954e3589319b6dc8a6e6a71818c0e84a441e2397de8095ba0682f3d107296cbae5f67984c07a73406c1f85451c9980cdbd200cc321ed4765c88c6d944e410629dd17d1e772760128f27ecee54be477a09410c194f8d2f0d7d7a4b5ab1eed98c40b0b8a40ece95e48ca77b6c698cb52a91ca1703014b2908c15359ac4997efe4121a1ee218cfdfec8ca9302c504671aa30be1697cb725921026326822b60c794b089a25f6119ef24072db260695aed48413c784b99781e0ea265b61f05d6a43b0df7abfcd30d53e3c68b6a8d3257a6c5aa6727929e1bff92b8112ae13a513ba6a1b696b303c5a7248630660bd32c8cb5c47c9819eff28cf7a38a17bb7f16ec1f52e7ea348413c6b375d602109af5713e610753e321bac27dcc69a4168d2c7e1176a6f5c0f8b8f851471660f06d0f41576e3c09eb6b22f1dfe060f3c2820249e5b2c4f50938b2684762addab305b958c6375e7a5c07a28a18dd09a004d38d533a2044633cbd31aba20828440863b63ee1194fcfa6c9f2c8e28b32f1774a261be3a33c86fabb0403222cde95609e986c6f99c5af541cf72790f06ae84969188f8cf883df0ef4e208636b461a5d16269d93dfa6ebca398114e5e34929cef8ccf22b0916e53d0e4a3d7655fbdd7961ebbc2b14e26eee1f3fef1676bf023274a9148e8c8cc892c88a50ec7088c483219dad78ced5bf770b8785c2eecf62e1fa7da150382c7f3f9ffa43649af1180fd577858de16a3005c36c33ca98fb57f99b3174787858d8fde6e05d777f7fffdd3fbfdf85f3c3ad9ff2f9bf5c0dea285acd511ed585d12ba284337cec0f4b8dabeff27940d93aa4640a85279be3f3c74f0af4e4b050ceb70165303c56e60edf155f9a2149141a362adff132fe9bcf3394278ccce1d6f8a6fd781358711ed0dae31dc4f6ed301b0e57ffdac186b00194c186f1b73c6f37f9c79b85c2d6e135f49a1fd38f85713bf8db7b25d890f870f02650e89702aadf2f9d5ee7c3d66e5f5fc3817fcc871f69bb7eaf209af164453f22941164e5a06ec4184b5afbfa3f2f67169d60dff6bbb3b24d9c8b552018977ff5adc5d57d49bbf43adeaa20edbcd3e96ddd1e035af3fa6655949b3b7e9909e5b2f855ecee321eedfc79e18e1814a63c0e6116a2c1057f2fdf26a832602e0166119f3620dc8ccf7ff957ffc562b1791225488212cd9c93cb72f13ebef6873e9e37cfbfbb0142efdbe181be8f7ffa3345b8c7ff2d512d96fff4ed3763de4e4ebea5df2617ef8584d4a05378f46adcf5af801176fcab75fdb1fdffdaff0074247e804dd0d7c30000000049454e44ae426082, 'Sofie, jung, dynamisch, erfolglos ...', 'Tekla', 'DE13WELATLAT1114561111', 'WELATLAT');


/* nativer insert der Kuenstler - ohne avatar
  INSERT INTO kuenstler SET
  kunden_ID = 1401,
  kuenstler_ID = 1401,
  avatar = '',
  portrait = 'Frau Andrea Sprint ist eine ...',
  pseudonym = 'AnSprint',
  iban = 'DE02WELADTAT1234567891',
  bic = 'WELADTAT';
  INSERT INTO kuenstler SET
  kunden_ID = 1404,
  kuenstler_ID = 1402,
  avatar = 'avatar_1404.png',
  portrait = 'Ich bin zweifellos grandios ...',
  pseudonym = 'einHeine',
  iban = 'DE02WELADEAD2143658791',
  bic = 'WELADEAD';
  INSERT INTO kuenstler SET
  kunden_ID = 1405,
  kuenstler_ID = 1403,
  avatar = 'avatar_1405.png',
  portrait = 'Sofie, jung, dynamisch, erfolglos ...',
  pseudonym = 'Tekla',
  iban = 'DE13WELATLAT1114561111',
  bic = 'WELATLAT';
*/

INSERT INTO login SET kunden_ID = 1401, login = 'ansprint', password = SHA2("ans",256);  
INSERT INTO login SET kunden_ID = 1402, login = 'brantd', password = SHA2("bra",256);   
INSERT INTO login SET kunden_ID = 1403, login = 'MaP', password = SHA2("Ma",256);  
INSERT INTO login SET kunden_ID = 1404, login = 'Heine', password = SHA2("Hei",256);  
INSERT INTO login SET kunden_ID = 1405, login = 'Takla', password = SHA2("Tak",256);


INSERT INTO bild SET
    kunden_ID = 1401,
    kuenstler_ID = 1401,
    bild_ID = 1401,
    titel = 'Wasserfall',
    beschreibung = 'Wasserfall in CZ',
    bild = 'pic_1401.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 250,
    erscheinungsjahr = 2017,
    upload_ip = '12.12.14.15',
    upload_datum = '2018-12-18',
    kauf_ip = '11.10.13.28',
    kauf_datum = '2018-12-18 14:12:00';
INSERT INTO bild SET
    kunden_ID = 1401,
    kuenstler_ID = 1401,
    bild_ID = 1402,
    titel = 'Empfang',
    beschreibung = 'Funkermuseum KW',
    bild = 'pic_1402.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 25,
    erscheinungsjahr = 2017,
    upload_ip = '12.12.4.24',
    upload_datum = '2018-12-14',
    kauf_ip = '',
    kauf_datum = '';
INSERT INTO bild SET
    kunden_ID = 1401,
    kuenstler_ID = 1401,
    bild_ID = 1403,
    titel = 'Snowflake',
    beschreibung = 'Steingarten im Winter',
    bild = 'pic_1403.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 120,
    erscheinungsjahr = 2019,
    upload_ip = '120.134.14.15',
    upload_datum = '2019-01-03',
    kauf_ip = '15.12.234.12',
    kauf_datum = '2019-01-03 16:14:01';
    
INSERT INTO bild SET
    kunden_ID = 1404,
    kuenstler_ID = 1402,
    bild_ID = 1404,
    titel = 'Sandstein',
    beschreibung = 'farbenfroher Sandstein',
    bild = 'pic_1404.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 47.90,
    erscheinungsjahr = 2001,
    upload_ip = '56.70.102.15',
    upload_datum = '2018-12-18',
    kauf_ip = '11.10.13.28',
    kauf_datum = '2018-12-26 19:12:36';
INSERT INTO bild SET
    kunden_ID = 1404,
    kuenstler_ID = 1402,
    bild_ID = 1405,
    titel = 'Elbfall',
    beschreibung = 'Elbbaude erstarrt',
    bild = 'pic_1405.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 89,
    erscheinungsjahr = 2016,
    upload_ip = '172.12.43.24',
    upload_datum = '2018-12-16',
    kauf_ip = '',
    kauf_datum = '';
INSERT INTO bild SET
    kunden_ID = 1404,
    kuenstler_ID = 1402,
    bild_ID = 1406,
    titel = 'Nordsee Bewohner',
    beschreibung = 'Familie Möve tummelt sich am Strand',
    bild = 'pic_1406.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 56,
    erscheinungsjahr = 2015,
    upload_ip = '121.133.143.135',
    upload_datum = '2019-01-01',
    kauf_ip = '15.122.234.122',
    kauf_datum = '2019-01-05 21:45:14';
INSERT INTO bild SET
    kunden_ID = 1405,
    kuenstler_ID = 1403,
    bild_ID = 1407,
    titel = 'Kinderüberaschung',
    beschreibung = 'In jedem 7. Ei',
    bild = 'pic_1407.png',
    bild_hoehe = 100,
    bild_breite = 200,
    preis = 25,
    erscheinungsjahr = 2013,
    upload_ip = '56.170.112.15',
    upload_datum = '2018-12-24',
    kauf_ip = '',
    kauf_datum = '';
INSERT INTO bild SET
    kunden_ID = 1405,
    kuenstler_ID = 1403,
    bild_ID = 1408,
    titel = 'Bewegung',
    beschreibung = 'Bewegung am rande der Wahrnehmung',
    bild = 'pic_1408.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 45,
    erscheinungsjahr = 2014,
    upload_ip = '172.12.43.214',
    upload_datum = '2018-12-01',
    kauf_ip = '',
    kauf_datum = '';
INSERT INTO bild SET
    kunden_ID = 1405,
    kuenstler_ID = 1403,
    bild_ID = 1409,
    titel = 'Landleben',
    beschreibung = 'Auf dem Feld...',
    bild = 'pic_1409.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 395,
    erscheinungsjahr = 2014,
    upload_ip = '121.13.1.135',
    upload_datum = '2018-12-01',
    kauf_ip = '',
    kauf_datum = '';
INSERT INTO bild SET
    kunden_ID = 1405,
    kuenstler_ID = 1403,
    bild_ID = 1410,
    titel = 'Nach dem Spiel',
    beschreibung = 'Eishockey hinterlässt spuren',
    bild = 'pic_1410.png',
    bild_hoehe = 400,
    bild_breite = 600,
    preis = 501,
    erscheinungsjahr = 2015,
    upload_ip = '172.30.1.135',
    upload_datum = '2019-01-03',
    kauf_ip = '',
    kauf_datum = '';


INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1401, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1402, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1403, 130);

INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1404, 134);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1405, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1406, 130);

INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1407, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1408, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1409, 130);
INSERT INTO eingeordnet (bild_ID, kategorie_ID) VALUES (1410, 130);

INSERT INTO message SET
     message_ID = 1401,
     von_ID = 1401,
	   an_ID = 1403,
	   gelesen = 0,
	   geloescht = 0,
	   msg_text = 'Dies ist eine Test Nachricht';
