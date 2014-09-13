function delayload($q,$rootScope,url){
	var deferred = $q.defer();
            var dependencies =url;
            $.getScript(dependencies, function()
            {
                $rootScope.$apply(function()
                {
                    deferred.resolve();
                });
            });
            return deferred.promise;
}