const contentPanel = document.querySelector('.content');

const HTMLRoutes = {
  start: 'html/start.html',
  members: 'html/members/members.html',
  meetings: 'html/meetings/meetings.html',
  swaps: 'html/swaps/swaps.html',
  restore: 'html/restore.html'

};


const UIController = (() => {

  const addControllerScript = (scriptId, scripSrc) => {
    if (document.getElementById(scriptId) == null) {
      let script = document.createElement('script');
      script.setAttribute('src', scripSrc);
      script.setAttribute('id', scriptId);
      document.head.appendChild(script);
    }
  }

  const changeActiveItem = (elementId) => {
    document.querySelector('.active').classList.remove('active');
    document.getElementById(elementId).classList.add('active');
  }

  const getStartUpJSON = () => {
    let response = post('php/start.php', null);
    console.log(response);
    let startUpResponse = response;
    let startUpJSON = JSON.parse(startUpResponse);
    return startUpJSON;
  }

  const setUpStartUp = () => {
    let startUpJSON = getStartUpJSON();

    document.getElementById(DOMStrings.allMembersH2).innerHTML = startUpJSON.allPartners;
    document.getElementById(DOMStrings.activesH2).innerHTML = startUpJSON.allActive;
    document.getElementById(DOMStrings.inactivesH2).innerHTML = startUpJSON.allInactive;
    document.getElementById(DOMStrings.newersH2).innerHTML = startUpJSON.add;
    document.getElementById(DOMStrings.itcgStudentsLabel).innerHTML = startUpJSON.itcg;
    document.getElementById(DOMStrings.cusurStudentsLabel).innerHTML = startUpJSON.cusur;
    document.getElementById(DOMStrings.upnStudentsLabel).innerHTML = startUpJSON.upn;
    document.getElementById(DOMStrings.crenStudentsLabel).innerHTML = startUpJSON.cren;
    document.getElementById(DOMStrings.privateStudentsLabel).innerHTML = startUpJSON.particular;
    document.getElementById(DOMStrings.workersLabel).innerHTML = startUpJSON.worker;
    document.getElementById(DOMStrings.tecmmLabel).innerHTML = startUpJSON.tmm;
  }


  return {

    openStart: () => {
      load(HTMLRoutes.start, contentPanel);
      changeActiveItem(DOMStrings.startLi);
      setUpStartUp();
    },

    openMembers: () => {
      load(HTMLRoutes.members, contentPanel);
      addControllerScript('members-controller-script', 'js/Controllers/MembersController.js');
      changeActiveItem(DOMStrings.membersLi);
      if (typeof MembersController !== 'undefined') {
        MembersController.init();
      }
    },

    openMeetings: () => {
      load(HTMLRoutes.meetings, contentPanel);
      addControllerScript('meetings-controller-script', 'js/Controllers/MeetingsController.js');
      changeActiveItem(DOMStrings.meetingsLi);
      if (typeof MeetingsController !== 'undefined') {
        MeetingsController.init();
      }
    },

    openSwaps: () => {
      load(HTMLRoutes.swaps, contentPanel);
      addControllerScript('swaps-controller-script', 'js/Controllers/SwapsController.js');
      changeActiveItem(DOMStrings.swapsLi);
      if (typeof SwapsController !== 'undefined') {
        SwapsController.init();
      }
    },

    openRestore: () => {
      load(HTMLRoutes.restore, contentPanel);
      changeActiveItem(DOMStrings.restoreLi);
      setUpCreateBackUpEvent();
      setUpRestoreEvent();
    }
  }
})();



const controller = (() => {

  const setUpEvents = () => {
    document.getElementById(DOMStrings.startLink).addEventListener('click', UIController.openStart);
    document.getElementById(DOMStrings.membersLink).addEventListener('click', UIController.openMembers);
    document.getElementById(DOMStrings.meetingsLink).addEventListener('click', UIController.openMeetings);
    document.getElementById(DOMStrings.swapsLink).addEventListener('click', UIController.openSwaps);
    document.getElementById(DOMStrings.restoreLink).addEventListener('click', UIController.openRestore);

  }

  return {
    init: () => {
      UIController.openStart();
      setUpEvents();
    }
  }

})(UIController);

controller.init();