(function($){
    'use strict';

    var nb = DOMBuilder;

    var StdClass = function() {
        this.attributes = {};

        this.init = function() {
            return this;
        }

        this.setAttribute = function(attr, val) {
            if('undefined' == typeof this.attributes[attr]){
                throw ("Unknown attribute to set: "+attr);
            }
            else{
                this.attributes[attr] = val;
                $(this).trigger('set.'+attr, val);
            }
        }

        this.getAttribute = function(attr) {
            if('undefined' == typeof this.attributes[attr]) {
                throw ("Unknown attribute to get: " + attr);
            }
            else {
                return this.attributes[attr];
            }
        }

        this.isPropertySet = function(obj, prop) {
            if('undefined' == typeof obj[prop]) {
                return false;
            }
            if (obj[prop] === null) {
                return false;
            }
            return true;
        }
    }

    var Station = function(){
        StdClass.call(this);

        var me = this;

        this.init = function(data, session){
            this.attributes['id'] = this.isPropertySet(data, 'id') ? data['id'] : null;
            this.attributes['name'] = this.isPropertySet(data, 'name') ? data['name'] : null;
            this.attributes['isCommissioned'] = this.isPropertySet(data, 'isCommissioned') ? data['isCommissioned'] : null;
            this.attributes['macAddress'] = this.isPropertySet(data, 'macAddress') ? data['macAddress'] : null;
            this.attributes['session'] = null;

            this.attributes['wrapperNodeId'] = 'station-'+this.getAttribute('id');
            this.attributes['nameNodeId'] = this.getAttribute('wrapperNodeId')+'-name';
            this.attributes['sessionNodeId'] = this.getAttribute('wrapperNodeId')+'-session';
            this.attributes['durationNodeId'] = this.getAttribute('wrapperNodeId')+'-duration';
            this.attributes['timeStartedNodeId'] = this.getAttribute('wrapperNodeId')+'-timeStarted';
            this.attributes['endTimeNodeId'] = this.getAttribute('wrapperNodeId')+'-endTime';
            this.attributes['totalCostNodeId'] = this.getAttribute('wrapperNodeId')+'-totalCost';
            this.attributes['usageNodeId'] = this.getAttribute('wrapperNodeId')+'-usage';
            this.attributes['actionNodeId'] = this.getAttribute('wrapperNodeId')+'-action';
            this.attributes['newSessionActionNodeId'] = this.getAttribute('wrapperNodeId')+'-newSessionAction';
            this.attributes['extendSessionActionNodeId'] = this.getAttribute('wrapperNodeId')+'-extendSessionAction';
            this.attributes['stopSessionActionNodeId'] = this.getAttribute('wrapperNodeId')+'-extendSessionAction';
            this.attributes['isRendered'] = false;

            this.refreshSession(session);

            return this;
        }
        /***
            <div class="dropdown">
                <i class="glyphicon glyphicon-cog dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" data-toggle="dropdown"></i>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="disabled">
                        <a href="#">New Session</a>
                    </li>
                    <li>
                        <a href="#">Extend Session</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Stop Session</a></li>
                </ul>
            </div>
        ***/
        this.render = function(parentNodeId){

            //create the station node and then append it to the parentNode
            var wrapperNode = nb('tr', {'id': this.getAttribute('wrapperNodeId')}).child([
                nb('td', {'id': this.getAttribute('nameNodeId')}).html(this.getAttribute('name')),
                nb('td', {'id': this.getAttribute('sessionNodeId')}),
                nb('td', {'id': this.getAttribute('durationNodeId')}),
                nb('td', {'id': this.getAttribute('timeStartedNodeId')}),
                nb('td', {'id': this.getAttribute('endTimeNodeId')}),
                nb('td', {'id': this.getAttribute('totalCostNodeId')}),
                nb('td', {'id': this.getAttribute('usageNodeId')}),
                nb('td', {'id': this.getAttribute('actionNodeId')}).child([
                    nb('div', {'class': 'dropdown'}).child([
                        nb('i', {'class': 'glyphicon glyphicon-cog dropdown-toggle', 'data-toggle': 'dropdown'}),
                        nb('ul', {'class': 'dropdown-menu dropdown-menu-right'}).child([
                            nb('li', {'id': this.getAttribute('newSessionActionNodeId'), 'class': ''}).child([
                                nb('a', {'href': 'javascript: void(0);'}).html('New Session')
                            ]),
                            nb('li', {'id': this.getAttribute('extendSessionActionNodeId'), 'class': ''}).child([
                                nb('a', {'href': 'javascript: void(0);'}).html('Extend Session')
                            ]),
                            nb('li', {'role': 'separator', 'class': 'divider'}),
                            nb('li', {'id': this.getAttribute('stopSessionActionNodeId'), 'class': 'disabled'}).child([
                                nb('a', {'href': 'javascript: void(0);'}).html('Stop Session')
                            ]),
                        ])
                    ])
                ])
            ]).asDOM();

            $('#'+parentNodeId).append(wrapperNode);

            //apply triggers
            $('#'+this.getAttribute('newSessionActionNodeId')).on('click', function(e){
                $(me).trigger('newSessionClick', me);
            });

            $('#'+this.getAttribute('extendSessionActionNodeId')).on('click', function(e){
                $(me).trigger('extendSessionClick', me);
            });

            $('#'+this.getAttribute('stopSessionActionNodeId')).on('click', function(e){
                $(me).trigger('stopSessionClick', me);
            });

            this.setAttribute('isRendered', true);
            this.updateDisplay();
        }

        this.refreshSession = function(session){
            this.setAttribute('session', session);
            this.updateDisplay();
        }

        this.updateDisplay = function(){
            if (this.getAttribute('isRendered')) {

                var session = this.getAttribute('session');

                if(session == null) {
                    $('#'+this.getAttribute('wrapperNodeId')).removeClass('info');
                    $('#'+this.getAttribute('wrapperNodeId')).addClass('active');
                    $('#'+this.getAttribute('sessionNodeId')).html('No');
                    $('#'+this.getAttribute('durationNodeId')).html('');
                    $('#'+this.getAttribute('timeStartedNodeId')).html('');
                    $('#'+this.getAttribute('endTimeNodeId')).html('');
                    $('#'+this.getAttribute('endTimeNodeId')).html('');
                    $('#'+this.getAttribute('totalCostNodeId')).html('');
                    $('#'+this.getAttribute('usageNodeId')).html('');
                }
                else {
                    $('#'+this.getAttribute('wrapperNodeId')).removeClass('active');
                    $('#'+this.getAttribute('wrapperNodeId')).addClass('info');
                    $('#'+this.getAttribute('sessionNodeId')).html('Yes');
                    if (session.getAttribute('duration') == null) {
                        $('#'+this.getAttribute('durationNodeId')).html('Open Time');
                    }
                    else {
                        $('#'+this.getAttribute('durationNodeId')).html('date');
                    }

                }
            }
        }

    }

    Station.prototype = new StdClass();
    Station.constructor = Station;

    var Session = function()
    {
        StdClass.call(this);
        var me = this;

        this.init = function(data) {
            this.attributes['id'] = this.isPropertySet(data, 'id') ? data['id'] : null;
            this.attributes['stationId'] = this.isPropertySet(data, 'stationId') ? data['stationId'] : null;
            this.attributes['administratorId'] = this.isPropertySet(data, 'administratorId') ? data['administratorId'] : null;
            this.attributes['duration'] = this.isPropertySet(data, 'duration') ? data['duration'] : null;
            this.attributes['durationEndTime'] = this.isPropertySet(data, 'durationEndTime') ? data['durationEndTime'] : null;
            this.attributes['startTime'] = this.isPropertySet(data, 'startTime') ? data['startTime'] : null;
            this.attributes['endTime'] = this.isPropertySet(data, 'endTime') ? data['endTime'] : null;
            this.attributes['cost'] = this.isPropertySet(data, 'cost') ? data['cost'] : null;
            this.attributes['isPaid'] = this.isPropertySet(data, 'isPaid') ? data['isPaid'] : null;
            this.attributes['comment'] = this.isPropertySet(data, 'comment') ? data['comment'] : null;
            this.attributes['isInSession'] = this.isPropertySet(data, 'isInSession') ? data['isInSession'] : null;

            return this;
        }
    }

    var NewSessionPopup = function()
    {
        StdClass.call(this);
        var me = this;

        this.init = function(){
            this.attributes['mainNodeId'] = 'new-session-popup';
            this.attributes['formNodeId'] = 'new-session-form';
            this.attributes['fieldsetNodeId'] = 'new-session-fieldset';
            this.attributes['stationNameNodeId'] = 'new-session-station';
            this.attributes['hoursDropdownNodeId'] = 'new-session-hours';
            this.attributes['commentsTextAreaNodeId'] = 'new-session-comments';
            this.attributes['cancelButtonNodeId'] = 'new-session-cancel';
            this.attributes['startButtonNodeId'] = 'new-session-start';
            this.attributes['currentStation'] = null;
            this.attributes['isProcessing'] = false;

            $('#'+this.getAttribute('startButtonNodeId')).on('click', function(e){
                console.log('starting session');
                $(me).trigger('sessionStarted', {
                    'station': me.getAttribute('currentStation'),
                    'numberOfHours': $('#'+me.getAttribute('hoursDropdownNodeId')).val(),
                    'comments': $('#'+me.getAttribute('commentsTextAreaNodeId')).val(),
                });
            });

            $('#'+this.getAttribute('mainNodeId')).on('hide.bs.modal', function (e) {
                return !me.getAttribute('isProcessing');
            });

            return this;
        }

        this.open = function(station){
            this.setAttribute('currentStation', station);
            this.reset();

            $('#'+this.getAttribute('stationNameNodeId')).html(station.getAttribute('name'));
            $('#'+this.getAttribute('mainNodeId')).modal({
                'keyboard': true,
                'backdrop': 'static',
            });
        }

        this.close = function(){
            this.reset();
            $('#'+this.getAttribute('mainNodeId')).modal('hide');
        }

        this.reset = function(){
            this.setAttribute('isProcessing', false);

            $('#'+this.getAttribute('hoursDropdownNodeId')).prop('disabled', false);
            $('#'+this.getAttribute('commentsTextAreaNodeId')).prop('disabled', false);
            $('#'+this.getAttribute('cancelButtonNodeId')).prop('disabled', false);
            $('#'+this.getAttribute('cancelButtonNodeId')).removeClass('disabled');
            $('#'+this.getAttribute('startButtonNodeId')).button('reset');
        }

        this.displayProcessing = function(){
            //disable the form
            this.setAttribute('isProcessing', true);

            $('#'+this.getAttribute('hoursDropdownNodeId')).prop('disabled', true);
            $('#'+this.getAttribute('commentsTextAreaNodeId')).prop('disabled', true);
            $('#'+this.getAttribute('cancelButtonNodeId')).prop('disabled', true);
            $('#'+this.getAttribute('cancelButtonNodeId')).addClass('disabled');

            $('#'+this.getAttribute('startButtonNodeId')).button('loading');
        }
    }

    var StationMonitor = function(){

        StdClass.call(this);
        var me = this;

        this.init = function(data) {
            this.attributes['stationListNodeId'] = this.isPropertySet(data, 'stationListNodeId') ? data['stationListNodeId'] : 'station-list';
            this.attributes['stations'] = {};
            this.attributes['newSessionPopup'] = new NewSessionPopup().init();
            this.attributes['isDirty'] = false;
            this.attributes['isRefreshing'] = false;

            var stationsData = this.isPropertySet(data, 'stations') ? data['stations'] : {};
            var sessionData = this.isPropertySet(data, 'sessions') ? data['sessions']: {};

            $.each(stationsData, function(index, iStationData){
                var stationId = iStationData['id'];
                var iSession = 'undefined' == typeof sessionData[stationId] ? null : new Session().init(sessionData[stationId]);
                var station = new Station().init(iStationData, iSession);
                me.getAttribute('stations')[station.getAttribute('id')] = station;
                station.render(me.getAttribute('stationListNodeId'));

                $(station).on('newSessionClick', function(evt, station){
                    me.startSession(station);
                });

            });

            $(this.attributes['newSessionPopup']).on('sessionStarted', function(e, data){
                //display processing
                me.getAttribute('newSessionPopup').displayProcessing();

                var sessionData = {
                    'stationId': data['station'].getAttribute('id'),
                    'numberOfHours': data['numberOfHours'],
                    'comments': data['comments']
                };

                $.ajax({
                    type: "POST",
                    url: '/app_dev.php/sessions/new',
                    data: sessionData,
                    success: function(data){
                        me.getAttribute('newSessionPopup').close();
                        me.refreshMonitor();
                    },
                });

            });

            //start the interval
            window.setInterval(function(){ me.refreshMonitor() }, 3000);

            return this;
        }

        this.refreshMonitor = function()
        {
            if (!this.getAttribute('isRefreshing')) {
                this.setAttribute('isRefreshing', true);

                $.ajax({
                    type: "GET",
                    url: '/app_dev.php/sessions?status=active',
                    success: function(data){
                        me.setAttribute('isRefreshing', false);
                        //if dirty, refresh again
                        if (me.getAttribute('isDirty')) {
                            me.setAttribute('isDirty', false);
                            me.refreshMonitor();
                        }
                        else {
                            var mappedSessions = {};
                            $.each(data, function(index, iSessionData){
                                var stationId = iSessionData['stationId'];
                                mappedSessions[stationId] = new Session().init(iSessionData);
                            });

                            $.each(me.getAttribute('stations'), function(stationId, station){
                                var stationSession = 'undefined' == typeof mappedSessions[stationId] ? null : mappedSessions[stationId];
                                station.refreshSession(stationSession);
                            });

                            // $.each(stationsData, function(index, iSessionData){
                            //     var stationId = iSessionData['stationId'];
                            //     if ('undefined' == typeof me.getAttribute('stations')[stationId]) {
                            //         var station = me.getAttribute('stations')[stationId];
                            //         var session = new Session().init(iSessionData);
                            //         station.setSession(session);
                            //     }
                            // });
                        }
                    }
                });
            }

        }

        this.startSession = function(station){
            this.getAttribute('newSessionPopup').open(station);
        }

    }
    StationMonitor.prototype = new StdClass();
    StationMonitor.constructor = StationMonitor;

    window.stationMonitor = new StationMonitor();


})(jQuery);